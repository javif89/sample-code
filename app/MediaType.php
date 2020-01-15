<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaType extends Model {

    protected $fillable = ['name'];

    public $timestamps = false;

    public static $rules = [
        // Validation rules
    ];

    // Relationships
    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_media');
    }
}
