<?php namespace App\Http\Controllers;

class CareerController extends Controller {

    const MODEL = "App\Career";
    const CHECKBOXES = ['active'];

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
