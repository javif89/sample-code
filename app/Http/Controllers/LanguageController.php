<?php

namespace App\Http\Controllers;

use App\Language;
use Ricoma\ContentServiceClient\ContentServiceClient;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    use RESTActions;

    const MODEL = 'App\Language';

    public function update(Request $request, $id){
        Language::find($id)->update($request->all());
        return json_encode(Language::find($id));
    }
}
