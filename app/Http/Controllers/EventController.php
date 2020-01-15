<?php namespace App\Http\Controllers;

use App\CountryContext;
use App\Event;
use App\EventType;
use App\MediaType;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventController extends Controller {

    const MODEL = "App\Event";
    const CHECKBOXES = [];

    use RESTActions;

    public function __construct()
    {
        $this->middleware('auth', ['only' => [
            'add',
            'put',
            'remove'
        ]]);
    }

    public function create(Request $request)
    {

        $payload = $request->all();

        // Go through the checkbox fields
        foreach (self::CHECKBOXES as $c) {
            $payload[$c] = $request->has($c);
        }

        $event = Event::create($payload);

        // Check if type trade show
        $tradeShowId = EventType::where('name', 'Trade Show')->first()->id;
        $generalId = EventType::where('name', 'General')->first()->id;
        if ($payload['event_type_id'] == $tradeShowId || $payload['event_type_id'] == $generalId) {
        foreach (Event::getTradeshowContent() as $name) {
            $event->content()->create([
                'name' => $name,
                'text' => $name == "tradeshow_promo" ? "" : "Placeholder content"
            ]);
        }

        $image_media_type_id = MediaType::where('name', 'image')->first()->id;

        foreach (Event::getTradeshowMedia() as $name) {
            $event->media()->create([
                'name' => $name,
                'media_type_id' => $image_media_type_id
            ]);
        }
    }

        return $this->respond(Response::HTTP_CREATED);
    }

    public function getContent(Event $event)
    {
        $countryContext = new CountryContext();
        $country = $countryContext->get();
        $lang = $countryContext->getLang();

        $content = $event->content()
            ->where('country_code', $country)
            ->where('lang_code', $lang)
            ->get();

        if ($content->count() == 0) {
            $content = $event->content()
                ->where('country_code', "DEFAULT")
                ->where('lang_code', "en")
                ->get();
        }

        if ($content->count() == 0) {
            $content = $event->content()
                ->where('country_code', "US")
                ->where('lang_code', "en")
                ->get();
        }

        return json_encode($content);
    }

    public function getMedia(Event $event)
    {
        $countryContext = new CountryContext();
        $country = $countryContext->get();
        $lang = $countryContext->getLang();

        $media = $event->media()
            ->where('country_code', $country)
            ->where('lang_code', $lang)
            ->get();

        if ($media->count() == 0) {
            $media = $event->media()
                ->where('country_code', "DEFAULT")
                ->where('lang_code', "en")
                ->get();
        }

        if ($media->count() == 0) {
            $media = $event->media()
                ->where('country_code', "US")
                ->where('lang_code', "en")
                ->get();
        }

        return json_encode($media);
    }

}
