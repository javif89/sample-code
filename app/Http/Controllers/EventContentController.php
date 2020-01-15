<?php namespace App\Http\Controllers;

use App\EventContent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventContentController extends Controller {

    const MODEL = "App\EventContent";

    use RESTActions;

    public function __construct()
    {
        $this->middleware('auth', ['only' => [
            'add',
            'put',
            'remove'
        ]]);
    }

    public function update(Request $request, $id)
    {
        if ($id !== '-1') {
            $model = EventContent::find($id);
            if (is_null($model)) {
                return $this->respond(Response::HTTP_NOT_FOUND);
            }
        } else {
            $data = $request->all();
            $model = EventContent::create($data);
        }

        $payload = $request->all();

        // Go through the checkbox fields
        foreach (self::CHECKBOXES as $c) {
            $payload[$c] = $request->has($c);
        }

        $model->update($payload);

        return $this->respond(Response::HTTP_OK, $model);
    }

}
