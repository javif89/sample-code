<?php namespace App;

use App\Events\ProductModified;
use Illuminate\Database\Eloquent\Model;

class ProductMedia extends Model {

    protected $guarded = ['id'];
    protected $with = ['type'];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    public static $types = [
        'machine_photos' => 'Machine Photo',
        'brochure' => 'Brochure',
        'editable_brochure' =>  'Editable Brochure',
        'parts_book' =>  'Parts Book',
        'operations_manual' =>  'Operations Manual',
    ];

    public static function boot()
    {
        parent::boot();

        self::saved(function ($model) {
            // notify superadmins about this action
            if ($model->product) {
                event(new ProductModified($model->product->name, \Auth::user()));
            }
        });

        self::deleting(function ($model) {
            // notify superadmins about this action
            event(new ProductModified($model->product->name, \Auth::user()));
        });
    }

    public function scopeCountry($query, $countryCode)
    {
        return $query->where('country_code', $countryCode);
    }

    // Relationships
    public function type()
    {
        return $this->belongsTo(MediaType::class, 'media_type_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class)->setEagerLoads([]);
    }

    public static function determineMediaType($path)
    {
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        // In case the filename happens to have a dot we need to make sure we get the real extension
        $array = explode('.', $extension);
        $extension = end($array);

        if (in_array($extension, ["jpg", "jpeg", "png", "gif"])) {
            return MediaType::whereName('image')->first()->id;
        }

        return MediaType::whereName('other')->first()->id;
    }

    public function getFileNameAttribute()
    {
        $parent_product = Product::without(['media', 'content', 'categories', 'countries'])->where('id', $this->product_id)->first();
        $productName = str_replace(" ", "_", strtolower($parent_product->name));
        $fileName = str_replace(" ", "_", strtolower($this->name));
        $extention = pathinfo($this->path, PATHINFO_EXTENSION);

        return "$productName"."_$fileName.$extention";
    }

    public function getTypeNameAttribute()
    {
        return self::$types[$this->caption] ?? $this->caption;
    }

    public function scopeDistributor($query)
    {
        return $query->where('distributor_file', 1);
    }

    public function scopeBranding($query)
    {
        return $query->where('caption', 'branding_assets')->where('product_id', 'ricoma');
    }
}
