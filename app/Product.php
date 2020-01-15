<?php namespace App;

use App\Traits\IsEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

class Product extends Model {

    use Searchable;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $with = ['media', 'content', 'categories'];
    protected $appends = ['thumbnail_path', 'link'];
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';

    use IsEntity;

    public static $rules = [
        // Validation rules
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $id = Str::uuid()->toString();
            $model->id = $id;
            $model->slug = Str::slug($model->name, '-');
            Entity::create(['id' => $id]);
        });

        self::updating(function ($model) {
            $model->slug = Str::slug($model->name, '-');
        });
    }

    public static function getAccessories(){
        $cat = ProductCategory::whereSlug('accessories')->first();

        return $cat->products;
    }

    public static function panelTypes(){
        return [
            'em',
            'tc',
            '8s',
            'cht',
            'mt',
            'mt1502'
        ];
    }

    // Relationships
//    public function category()
//    {
//        return $this->belongsTo(ProductCategory::class, 'product_category_id');
//    }

    public function getCategoryIdsAttribute()
    {
        return $this->categories()->pluck('product_categories.id')->toArray();
    }

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class, 'product_category_product', 'product_id', 'product_category_id');
    }

    public function content()
    {
        return $this->hasMany(ProductContent::class);
    }

    public function promotion()
    {
        return $this->belongsToMany(Promotion::class);
    }

    public function media()
    {
        return $this->hasMany(ProductMedia::class)->where('distributor_file', false);
    }

    public function accessories(){
        return $this->belongsToMany(Product::class, 'product_accessories', 'product_id', 'accessory_id', 'id', 'id')
            ->withPivot('is_main');
    }

    // Accessors
    public function getDistributorFilesAttribute()
    {
        return ProductMedia::where('product_id', $this->id)->where('distributor_file', true)->get();
    }

    public function getThumbnailPathAttribute(){
        if (Str::startsWith(Route::currentRouteName(), 'admin')) {
            $country = (new CountryContext)->get();
        } else {
            $country = session('country');
        }

        $media = ProductMedia::where('product_id', $this->id)->where('name', 'thumbnail')->where('country_code', $country)->first();

        if(!empty($media)) {
            return $media->path;
        }

        return '/images/admin/placeholder.png';
    }

    public function getLinkAttribute(){
        if($this->is_shopify_product) {
            return $this->shopify_link;
        }
        else {
            return getRoute('machine-page', ['slug' => $this->slug]);
        }
    }

    // Methods
    public function getContent($key){
        if (Str::startsWith(Route::currentRouteName(), 'admin')) {
            $country = (new CountryContext)->get();
            $lang = session('country_context_lang');
        } else {
            $country = session('country');
            $lang = session('locale');
        }

        $content = $this->content->where('name', $key)->where('country_code', $country)->whereIn('lang_code', [$lang, strtoupper($lang), strtolower($lang)])->first();

        if(empty($content)) {
            $content = $this->content->where('name', $key)->where('country_code', "DEFAULT")->first();
        }

        if(empty($content)) {
            $content = $this->content->where('name', $key)->where('country_code', "US")->first();
        }

        return $content ? $content->text : '';
    }

    public function scopeInCategory($query, $category){
        //$cat =  ProductCategory::where('name', $category)->first()->id;

        return $query->whereHas('categories', function ($query) use ($category) {
            $query->where('slug', '=', $category);
        });
    }

    public function getMedia($key)
    {
        if(Str::startsWith(Route::currentRouteName(), 'admin')) {
            $country = (new CountryContext)->get();
        }
        else {
            $country = session('country');
        }

        $media = $this->media->where('name', $key)->where('country_code', $country)->first();

        if (empty($media)) {
            $media = $this->media->where('name', $key)->where('country_code', "DEFAULT")->first();
        }

        if (empty($media)) {
            $media = $this->media->where('name', $key)->where('country_code', "US")->first();
        }

        // If we still can't find anything just return an empty media object to not cause errors
        if(empty($media)) {
            $media = json_decode(json_encode(['path' => '', 'caption' => '']));
        }

        return $media;
    }

    public function getProjectPics(){
        $projects = $this->media()->where('name', 'like', 'project_%')->orderBy('name')->get();

        return $projects;
    }

    public function getCarouselImages()
    {
        $pics = $this->media()->where('name', 'customer_carousel')->orderBy('name')->get();

        return $pics->pluck('path');
    }

    public function getInstagramPics(){
        $pics = $this->media()->where('name', 'instagram_photo')->orderBy('name')->get();

        return $pics;
    }

    public function getGalleryItems(){
        $hero = $this->getMedia('hero_image');

        $gallery = $this->media()->where('name', 'gallery')->orderBy('caption')->get();

        return $gallery->prepend($hero);
    }

    public function hasCategory($slug){
        return !empty($this->categories()->where('slug', $slug)->first());
    }

    /**
     * Facebook reviews are a bit different from other types of media since they have the customer name, picture AND the actual comment.
     * So each facebook review is comprised of a media component and a content component tied by having the same name.
     * 
     * When a review is created, we generate a unique id and name the content and the media using facebook_review_{id}
     */
    public function getFacebookReviews(){
        $content = $this->content()->where('name', 'like', '%facebook_review_%')->get();
        $media = $this->media()->where('name', 'like', '%facebook_review_%')->get();

        $results = [];
        // Now we group them together
        foreach ($content as $c) {
            $m = $media->where('name', $c->name)->first();

            $review = [
                'name' => $c->name,
                'customer_name' => $m->caption,
                'customer_image' => $m->path,
                'body' => $c->text,
                'media' => $m,
                'content' => $c
            ];

            $results[] = json_decode(json_encode($review));
        }

        return collect($results);
    }

    public function relatedProducts(){
        $catIds = $this->categoryIds;
        if (count($catIds)) {
            $products = Product::whereHas('categories', function ($query) use ($catIds) {
                $query->whereIn('product_categories.id', $catIds);
            })
                ->where('id', '!=', $this->id)
                    ->inRandomOrder()
                        ->limit(3)
                            ->get();

            return $products;
        }
    }

    public function hasAccessory(Product $product)
    {
        return !empty($this->accessories->where('id', $product->id)->first());
    }

    public function getAccessory(Product $product)
    {
        return $this->accessories->where('id', $product->id)->first();
    }

    public function getMainAccessory()
    {
        $mainAcc = $this->accessories()->where('is_main', true)->first();
        if (!$mainAcc) {
            $mainAcc = $this->accessories()->first();
        }

        return $mainAcc;
    }

    public function getOtherAccessories()
    {
        $accessories = $this->accessories;
        $main = $this->getMainAccessory();
        if ($main) {
            return $accessories->where('id', '!=', $main->id)->all();
        } else {
            return $accessories;
        }
    }

    public function getIncludedMedia(){
        $includedMedia = $this->media()->where('name', 'included')->orderBy('name')->get();

        return $includedMedia;
    }

    // Utility
    /**
     * Return the names of all the content pieces that a product is required to have
     * We can use this function whenever we need to do something related to the content
     * such as creating all the placeholder content for a product when it's created
     */
    public static function getContentNames(){
        return [
            'video_1_embed',
            'video_2_embed',
            'what_is_included',
            'description',
            'short_description',
            'panel_type',
            'spec_heads',
            'spec_needles',
            'spec_stitchesperminute',
            'spec_memorycapacity',
            'spec_embroideryarea',
            'spec_hoops',
            'spec_includes',
            'spec_usability',
            'specpanel_specs',
            'sizeweight_dimensions',
            'sizeweight_netweight',
            'sizeweight_shippingweight',
            'additional_features',
        ];
    }

    /**
     * Return the names of all the media pieces that a product is required to have
     * We can use this function whenever we need to do something related to the media
     * such as creating all the placeholder media for a product when it's created
     */
    public static function getMediaNames(){
        return [
            'hero_image',
            'thumbnail',
            'video_1_thumb',
            'video_2_thumb',
            'project_1',
            'project_2',
            'project_3',
            'project_4',
            'project_5',
            'project_6',
            'project_7',
            'project_8',
            'tablet_video',
            'hoop_top_img',
            'hoop_middle_img',
            'hoop_bottom_img',
            'needle_top_img',
            'needle_middle_img',
            'needle_bottom_img',
            'warranty_img',
            'customer_carousel',
            'social_proof_collage',
            'instagram_photo',
            'gallery',
            'included',
            'spec_panel'
        ];
    }

    /**
     * Perform search based on product names and product contents
     * $query String
     */

    public static function performSearch($query)
    {
        $products = self::search($query)->get();
        return $products;
//        $productContent = ProductContent::search($query)->get()
//                ->groupBy('product_id')
//                    ->toArray();
//        $productIds = array_keys($productContent);
//        return $products->merge(self::whereIn('id', $productIds)->get());


    }

    public function toSearchableArray()
    {
        return [
            'name' => $this->name
        ];
    }
}
