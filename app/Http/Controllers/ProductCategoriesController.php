<?php namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use Illuminate\Http\Response;

class ProductCategoriesController extends Controller {

    const MODEL = "App\ProductCategory";
    const CHECKBOXES = ['is_subcategory'];

    use RESTActions;

    public function __construct()
    {
        $this->middleware('auth', ['only' => [
            'add',
            'put',
            'remove'
        ]]);
    }

    public function all()
    {
        $categories = ProductCategory::with('products')->get();
        return $this->respond(Response::HTTP_OK, $categories);
    }

    public function remove($id)
    {
        $m = self::MODEL;
        if(is_null($m::find($id))){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }

        $cat = $m::find($id);
        $cat->delete();
        return $this->respond(Response::HTTP_NO_CONTENT);
    }

}
