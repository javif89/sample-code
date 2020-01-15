<?php namespace App\Http\Controllers;

use App\CountryContext;
use App\MediaType;
use App\Product;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use ZanySoft\Zip\Zip;

class ProductsController extends Controller {

    const MODEL = "App\Product";
    const CHECKBOXES = ['active', 'is_shopify_product'];

    use RESTActions;

    public function __construct()
    {
        $this->middleware('auth', ['only' => [
            'add',
            'put',
            'remove'
        ]]);
    }

    public function create(Request $request)
    {
        $payload = $request->all();
        // Go through the checkbox fields
        foreach (self::CHECKBOXES as $c) {
            $payload[$c] = $request->has($c);
        }

        unset($payload['categories']);

        $product = Product::create($payload);

        if ($request->has('categories')) {
            $product->categories()->attach($request->get('categories'));
        }

        // Create all the placeholder content and media
        foreach (Product::getContentNames() as $name) {
            $product->content()->create([
                'name' => $name,
                'text' => "Placeholder content"
            ]);
        }

        $image_media_type_id = MediaType::where('name', 'image')->first()->id;

        foreach (Product::getMediaNames() as $name) {
            $product->media()->create([
                'name' => $name,
                'media_type_id' => $image_media_type_id
            ]);
        }

        return $this->respond(Response::HTTP_CREATED, $product);
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, Product::$rules);
        $model = Product::find($id);

        if(is_null($model)){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }

        $payload = $request->all();
        unset($payload['categories']);
        // Go through the checkbox fields
        foreach (self::CHECKBOXES as $c) {
            $payload[$c] = $request->has($c);
        }

        $model->update($payload);
        $model->categories()->sync($request->get('categories'));

        return $this->respond(Response::HTTP_OK, $model);
    }


    public function remove($id)
    {
        $product = Product::find($id);

        if(is_null($product)){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }

        $product->content()->delete();
        $product->media()->delete();
        $product->delete();

        return $this->respond(Response::HTTP_NO_CONTENT);
    }

    public function compare(Request $request)
    {
        $products =  Product::setEagerLoads([])->whereIn('id', $request->get('ids'))->get();

        $return  = [];

        foreach ($products as $product) {
            $attrsKeyValue  = [];
            $attributes = $product->content->sortBy('name')->keyBy('name');
            foreach ($attributes as $k=>$v) {
                $attrsKeyValue[$k] = $v->text;
            }
            $productArray = $product->toArray();
            unset($productArray['content']);
            $return[] = [
                'product' => $productArray,
                'attributes' => $attrsKeyValue
            ];

        }

        return $this->respond(Response::HTTP_OK, $return);
    }

    public function getAccessories(Product $product){
        return json_encode($product->accessories);
    }

    public function addAccessory(Product $product, $id){
        $product->accessories()->attach($id);
        
        return json_encode($product->accessories);
    }

    public function removeAccessory(Product $product, $id)
    {
        $product->accessories()->detach($id);

        return json_encode($product->accessories);
    }

    public function toggleMainAccessory(Product $product, $id)
    {
        foreach ($product->accessories as $acc) {
            $product->accessories()->updateExistingPivot($acc->id, ['is_main' => 0]);
        }

        $product->accessories()->updateExistingPivot($id, ['is_main' => 1]);

        return json_encode($product->accessories()->get());

    }

    public function getContent(Product $product)
    {
        $countryContext = new CountryContext();
        $country = $countryContext->get();
        $lang = $countryContext->getLang();

        $content = $product->content()
            ->where('country_code', $country)
                ->where('lang_code', $lang)
                    ->get();

        if ($content->count() == 0) {
            $content = $product->content()
                ->where('country_code', "DEFAULT")
                    ->where('lang_code', "en")
                        ->get();
        }

        if ($content->count() == 0) {
            $content = $product->content()
                ->where('country_code', "US")
                    ->where('lang_code', "en")
                        ->get();
        }

        return json_encode($content);
    }

    public function getMedia(Product $product)
    {
        $countryContext = new CountryContext();
        $country = $countryContext->get();
        $lang = $countryContext->getLang();

        $media = $product->media()
                ->where('country_code', $country)
                    ->where('lang_code', $lang)
                        ->get();

        if ($media->count() == 0) {
            $media = $product->media()
                ->where('country_code', "DEFAULT")
                    ->where('lang_code', "en")
                        ->get();
        }

        if ($media->count() == 0) {
            $media = $product->media()
                ->where('country_code', "US")
                    ->where('lang_code', "en")
                        ->get();
        }

        return json_encode($media);
    }

    public function bulkMediaUpload(Request $request, Product $product){
        // First open the zip file and extract the files
        $tmpPath = storage_path(Str::uuid());
        $zip = Zip::open($request->file('zip_file')->path());
        $zip->extract($tmpPath);

        $files = array_filter($zip->listFiles(), function($path) {
            return !(Str::contains($path, '__MACOSX/'));
        });

        $image_media_type_id = MediaType::where('name', 'image')->first()->id;

        foreach (Product::getMediaNames() as $name) {
            if($name != 'instagram_photo' && $name != 'customer_carousel') {
                $file = array_filter($files, function($path) use($name) {
                    return Str::contains($path, $name);
                });

                $file = array_values($file);

                if (!empty($file[0])) {
                    $file = $file[0];

                    $path = FileService::generatePath($file);
                    Storage::disk('files')->put(basename($path), file_get_contents($tmpPath."/$file"));

                    $url = FileService::getFileUrl($path);

                    $product->media()->where('name', $name)->first()->update([
                        'path' => $url,
                        'media_type_id' => $image_media_type_id
                    ]);
                }
            }
            else {
                $thefiles = array_filter($files, function($path) use($name) {
                    return Str::contains($path, $name);
                });

                if (count($thefiles) != 0) {
                    foreach ($thefiles as $file) {
                        $path = FileService::generatePath($file);
                        Storage::disk('files')->put(basename($path), file_get_contents($tmpPath . "/$file"));

                        $url = FileService::getFileUrl($path);

                        $product->media()->create([
                            'path' => $url,
                            'name' => $name,
                            'media_type_id' => $image_media_type_id
                        ]);
                    }
                }
            }
        }

        // Delete temp folder
        exec('rm -rf '.$tmpPath);

        return back();
    }

}
