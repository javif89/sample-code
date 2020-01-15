<?php namespace App\Http\Controllers;

class MediaController extends Controller {

    const MODEL = "App\MediaType";

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
