<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller {

    public function upload(Request $request)
    {
        $data = $request->file('file')->get();
        $extension = $request->file('file')->getClientOriginalExtension();
        $id = uniqid('', true);

        $filename = "$id.$extension";

        Storage::disk('uploaded-files')->put($filename, $data);

        return Storage::disk('uploaded-files')->url($filename);
    }

    public function delete($filename)
    {
        Storage::disk('uploaded-files')->delete($filename);

        return $this->respond(Response::HTTP_NO_CONTENT);
    }

    protected function respond($status, $data = [])
    {
        return response()->json($data, $status);
    }

}
