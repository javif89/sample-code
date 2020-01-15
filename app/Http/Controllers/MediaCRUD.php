<?php

namespace App\Http\Controllers;

use App\MediaType;
use GuzzleHttp\Client;
use Ricoma\ContentServiceClient\ContentServiceClient;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait MediaCRUD
{

    protected $normalizedResourceName;

    public function __construct()
    {
        $this->normalizedResourceName = $this->normalizedResourceName();
    }

    private function saveFile(UploadedFile $file){
        $data = $file->get();
        $extension = $file->getClientOriginalExtension();
        $id = uniqid('', true);

        $filename = "$id.$extension";

        Storage::disk('files')->put($filename, $data);

        return Storage::disk('files')->url($filename);
    }

    private function copyFile($name){
        $data =  Storage::disk('files')->get(basename($name));
        $extension = pathinfo($name, PATHINFO_EXTENSION);
        $id = uniqid('', true);

        $filename = "$id.$extension";

        Storage::disk('files')->put($filename, $data);

        return Storage::disk('files')->url($filename);
    }

    private function deleteFile($name){
        Storage::disk('files')->delete(basename($name));
    }

    private function determineMediaType($path)
    {
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        // In case the filename happens to have a dot we need to make sure we get the real extension
        $array = explode('.', $extension);
        $extension = end($array);

        if (in_array($extension, ["jpg", "jpeg", "png", "gif"])) {
            return MediaType::whereName('image')->first()->id;
        }

        return MediaType::whereName('other')->first()->id;
    }

    public function create(Request $request)
    {
        $payload = $request->except('file', '_token');

        if ($request->hasFile('file')) {
            // Save the file
            $path = $this->saveFile($request->file('file'));

            // Insert path into payload
            $payload['path'] = $path;
        }
        
        // If we're importing media, create a copy of the file
        if ($request->has('path')) {
            $payload['path'] = $this->copyFile($request->input('path'));
        }

        $payload['media_type_id'] = $this->determineMediaType($payload['path'] ?? 'placeholder.png');

        // Create the record
        $m = self::MODEL;
        $model = $m::create($payload);

        if(request()->ajax()) {
            return json_encode($model->refresh());
        }

        $this->successMessage("New $this->normalizedResourceName created");

        return back();
        
    }

    public function update(Request $request, $id)
    {
        $payload = $request->except('file', '_token', 'old_file_name');

        // If a file was uploaded, update the file
        if ($request->hasFile('file')) {
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
        }


        $m = self::MODEL;
        $m::find($id)->update($payload);

        if(request()->ajax()) {
            return json_encode($m::find($id));
        }

        $this->successMessage("The $this->normalizedResourceName was updated");

        return back();
    }

    public function delete($id, Request $request)
    {
        // Delete the old file
        if ($request->has('old_file_name')) {
            $this->deleteFile($request->input('old_file_name'));
        }

        $m = self::MODEL;
        $m::find($id)->delete();

        if(request()->ajax()) {
            return json_encode(['message' => 'success']);
        }

        $this->successMessage("The $this->normalizedResourceName was deleted");

        return back();
    }

    protected function successMessage($message)
    {
        session()->flash('success', $message);
    }

    protected function normalizedResourceName()
    {
        return strtolower(str_replace('-', ' ', self::MODEL));
    }
}
