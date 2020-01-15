<?php

namespace App\Services;

use App\Event;
use App\EventType;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class EventService
{
    public static function getEventsForPage($regionId, $type){
        $today = Carbon::today();
        $tradeShowId = EventType::where('name', $type)->firstOrFail()->id;

        $tradeshows = Event::where('event_type_id', $tradeShowId)
            ->where('end_datetime', '>', $today)
            ->where(function($query) use ($regionId) {
                if(!empty($regionId)){
                    return $query->where('region_id', $regionId);
                }
            })
            ->with('media')
            ->with('content')
            ->orderBy('start_datetime')
            ->get();

        if(!empty($tradeshows)){
            foreach ($tradeshows as $key => $show) {
                foreach ($show->media as $key => $media) {
                    if ($media->name == 'tradeshow_main_image') {
                        $show->main_image_path = $media->path;
                    }
                }
            }
        }
        return $tradeshows;
    }
}