<?php namespace App\Http\Controllers;

use App\CountryContext;
use App\Promotion;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PromotionController extends Controller {

    const MODEL = "App\Promotion";
    const CHECKBOXES = ['active'];

    use MediaCRUD;
    use RESTActions {
        RESTActions::create as restCreate;
        RESTActions::update as restUpdate;
        RESTActions::delete as restDelete;

        RESTActions::create insteadof MediaCRUD;
        RESTActions::update insteadof MediaCRUD;
        RESTActions::delete insteadof MediaCRUD;
    }

    public function __construct()
    {
        $this->middleware('auth', ['only' => [
            'add',
            'put',
            'remove'
        ]]);
    }

    public function all(Request $request)
    {
        $countryContext = new CountryContext();
        return $this->respond(Response::HTTP_OK,
                Promotion::where('country_code', $countryContext->get())
                        ->where('lang_code', $countryContext->getLang())
                            ->get());
    }

    public function create(Request $request)
    {
        // Save the file and get the path
        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $path = $this->saveFile($file);
            $request->merge(['banner_image_path' => $path]);
        }

        return $this->restCreate($request);
    }
    public function update(Request $request, $id)
    {
        // Update the file and get the path
        if ($request->hasFile('banner_image')) {
            $promo = Promotion::find($id);
            $this->deleteFile($promo->banner_image_path);
            $file = $request->file('banner_image');
            $path = $this->saveFile($file);
            $request->merge(['banner_image_path' => $path]);
        }

        if ($request->has('banner_image') && $request->input('banner_image') == 'remove') {
            $request->merge(['banner_image_path' => null]);
        }

        return $this->restUpdate($request, $id);
    }

    public function addProducts(Request $request, $id)
    {
        $promo = Promotion::find($id);

        $products = $request->input("products");

        $promo->products()->detach();

        $promo->products()->attach($products);

        $promo->refresh();

        return back();
    }

    public function remove($id)
    {
        $m = self::MODEL;
        if(is_null($m::find($id))){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }
        $promo = $m::find($id);
        $promo->products()->detach();
        $promo->delete();
        return $this->respond(Response::HTTP_NO_CONTENT);
    }
}
