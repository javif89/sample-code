<?php namespace App\Http\Controllers;

class TranslationsController extends Controller
{

    const MODEL = "App\Translation";

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
