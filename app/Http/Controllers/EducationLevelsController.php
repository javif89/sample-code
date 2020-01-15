<?php namespace App\Http\Controllers;

class EducationLevelsController extends Controller {

    const MODEL = "App\EducationLevel";

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
