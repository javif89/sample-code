<?php namespace App\Http\Controllers;

class PromotionContentsController extends Controller {

    const MODEL = "App\PromotionContent";

    use RESTActions;

    public function __construct()
    {
        $this->middleware('auth', ['only' => [
            'add',
            'put',
            'remove'
        ]]);
    }
}
