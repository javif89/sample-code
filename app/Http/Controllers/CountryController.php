<?php

namespace App\Http\Controllers;

use App\Country;
use App\CountryContext;
use App\Entity;
use App\Events\ProductCountryChanged;
use Ricoma\ContentServiceClient\ContentServiceClient;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CountryController extends Controller
{
    use RESTActions;

    const RESOURCE = 'country';

    public function update(Request $request, $id)
    {
        $payload = $request->all();
        $country = Country::find($id);
        $country->update($payload);

        if ($request->ajax()) {
            return response()->json($country);
        } else {
            session()->flash('success', 'Country updated');
            return back();
        }

    }

    public function updateLanguages(Request $request, $id){
        $languages = $request->input('languages');

        $country = Country::find($id);

        $country->languages()->detach();

        $country->languages()->attach($languages);

        session()->flash('success', 'Country languages updated');

        return back();
    }

    public function setEntityCountries(Request $request, $id)
    {
        $user = \Auth::user();

        $entity = Entity::firstOrCreate(['id' => $id]);

        // Reset the entities countries
        $entity->countries()->detach();

        // Set the new regions
        $entity->countries()->attach($request->input('countries'));

        // Load the new data
        $entity->refresh();

        if ($request->get('entity_type') === 'product') {
            event(new ProductCountryChanged($request->get('entity_name'), $active, \Auth::user()));
        }

        return $this->respond(Response::HTTP_OK, $entity);

        session()->flash('success', 'Country availability updated');

        return back();
    }

    public function countryAvailabilityData(CountryContext $context, Request $request){
       $available = $context->getAvailableCountries();

       $m = $request->input('class');

       $model = $m::find($request->input('id'))->load('countries');

       return json_encode([
           'entity' => $model,
           'countries' => $available
       ]);
    }
}
