<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventProduct;
use App\Language;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Ricoma\ContentServiceClient\ContentServiceClient;

class EventProductsController extends Controller
{
    const RESOURCE = 'event-products';

    public function create(Request $request)
    {
        $payload = $request->all();
        $dates = $payload['filtered_dates'];
        $times = $payload['selected_times'];
        $response = [];
        foreach ($dates as $date) {
            foreach ($times as $time) {
                $start = Carbon::parse("$date $time")->toDateTimeString();
                $end = Carbon::parse("$start")->addHour()->toDateTimeString();
                $eventPayload = [
                    "name" => $payload['product_name'],
                    "event_type_id" => $payload['event_type_id'],
                    "start_datetime" => $start,
                    "end_datetime" => $end
                ];

                $event = Event::create($eventPayload);
                $eventProductPayload = [
                    "event_id" => $event->id,
                    "product_id" => $payload['product_id'],
                    "product_name" => $payload['product_name'],
                    "language_id" => $payload['language_id'],
                    "language_name" => $payload['language_name'],
                ];
        
                $response[] = EventProduct::create($eventProductPayload);
            }
        }

        return response()->json($response);
    }

    public function update(Request $request){
        $payload = $request->all();

        $eventId = $payload['event_id'];
        $eventProductId = $payload['event_product_id'] ?? null;
        $eventPayload = [
            "name" => Product::find($payload['product_id'])->name,
            "event_type_id" => $payload['event_type_id'],
            "start_datetime" => $payload['start_datetime'],
            "end_datetime" => $payload['end_datetime']
        ];
        
        Event::find($eventId)->update($eventPayload);
        $event = Event::find($eventId);
        
        $eventProductPayload = [
            "event_id" => $event->id,
            "product_id" => $payload['product_id'],
            "product_name" => Product::find($payload['product_id'])->name,
            "language_id" => $payload['language_id'],
            "language_name" => Language::find($payload['language_id'])->name,
        ];
        
        if($eventProductId == null){
            $response = EventProduct::create($eventProductPayload);
        } else {
            $response = EventProduct::find($eventProductId)->update($eventProductPayload);
        }
        
        return back();
    }
}
