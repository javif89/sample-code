<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileService
{
    /**
     * Generate the path (including random name) for a passed file name
     */
    public static function generatePath($filename){
        $filename = basename($filename);
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $id = uniqid('', true);

        $filename = "$id.$extension";

        return Storage::disk('files')->path($filename);
    }

    public static function getFileUrl($filename){
        $filename = basename($filename);
        return Storage::disk('files')->url($filename);
    }
}
