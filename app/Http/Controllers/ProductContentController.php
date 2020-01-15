<?php namespace App\Http\Controllers;

use App\Events\ProductModified;
use App\ProductContent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class ProductContentController extends Controller {

    const MODEL = "App\ProductContent";

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

        $this->validate($request, ProductContent::$rules);

        if ($id !== '-1') {
            $model = ProductContent::find($id);
            if(is_null($model)){
                return $this->respond(Response::HTTP_NOT_FOUND);
            }
        } else {
            $data = $request->all();
            $model = ProductContent::create($data);
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
