<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class EventMedia extends Model {

    protected $guarded = ['id'];

    protected $with = ['type'];

    protected $appends = ['file_name'];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships
    public function type()
    {
        return $this->belongsTo(MediaType::class, 'media_type_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class)->setEagerLoads([]);
    }

    public static function determineMediaType($path)
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

    public function getFileNameAttribute()
    {
        $eventName = str_replace(" ", "_", strtolower($this->event->name));
        $fileName = str_replace(" ", "_", strtolower($this->name));
        $extention = pathinfo($this->path, PATHINFO_EXTENSION);

        return "$eventName"."_$fileName.$extention";
    }
}
