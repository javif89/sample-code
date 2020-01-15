<?php namespace App\Http\Controllers;

class LanguagesController extends Controller
{

    const MODEL = "App\Language";

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
