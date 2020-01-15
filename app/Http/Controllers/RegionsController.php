<?php namespace App\Http\Controllers;

use App\Region;
use Illuminate\Http\Response;

class RegionsController extends Controller {

    const MODEL = "App\Region";

    use RESTActions;

    public function __construct()
    {
        $this->middleware('auth', ['only' => [
            'add',
            'put',
            'remove'
        ]]);
    }

    public function remove($id)
    {
        $m = self::MODEL;
        if(is_null($m::find($id))){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }
        $region = $m::find($id);
        // Get all the countries that belonged to this region and set them to the default region
        $region->countries()->update([
            'region_id' => Region::whereName('default')->first()->id
        ]);
        $region->delete();
        return $this->respond(Response::HTTP_NO_CONTENT);
    }

}
