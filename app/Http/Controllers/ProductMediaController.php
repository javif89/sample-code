<?php namespace App\Http\Controllers;

use App\MediaType;
use App\ProductMedia;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductMediaController extends Controller {

    const MODEL = "App\ProductMedia";

    use MediaCRUD;

    public function update(Request $request, $id)
    {
        $payload = $request->except('file', '_token', 'old_file_name');

        // If a file was uploaded, update the file
        if (!empty($_FILES['file'])) {
            $file = $request->file('file');

            // Delete the old file
            if ($request->has('old_file_name')) {
                $this->deleteFile($request->input('old_file_name'));
            }

            // Upload file using content service and get the path

            $path = $this->saveFile($file);

            // Insert path into payload
            $payload['path'] = $path;

            $payload['media_type_id'] = $this->determineMediaType($payload['path']);
        } else {
            $payload['media_type_id'] =  MediaType::whereName('image')->first()->id;
        }


        if ($id !== '-1') {
            $model = ProductMedia::find($id);
        } else {
            $model = ProductMedia :: create($payload);
        }

        $model->update($payload);

        if(request()->ajax()) {
            return json_encode($model);
        }

        $this->successMessage("The $this->normalizedResourceName was updated");

        return back();
    }

}
