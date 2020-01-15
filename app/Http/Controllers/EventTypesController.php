<?php namespace App\Http\Controllers;

use App\EventType;
use Illuminate\Http\Response;

class EventTypesController extends Controller {

    const MODEL = "App\EventType";

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
        $eventTypes = EventType::with('events')->get();
        return $this->respond(Response::HTTP_OK, $eventTypes);
    }
}
