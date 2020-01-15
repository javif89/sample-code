<?php namespace App\Http\Controllers;

class ApplicantsController extends Controller {

    const MODEL = "App\Applicant";

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
