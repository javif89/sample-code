<?php namespace App\Http\Controllers;

use App\CareerCategory;
use Illuminate\Http\Response;

class CareerCategoryController extends Controller {

    const MODEL = "App\CareerCategory";

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
        $categories = CareerCategory::with('careers')->get();
        return $this->respond(Response::HTTP_OK, $categories);
    }
}
