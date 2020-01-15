<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class EventProduct extends Model {

    protected $guarded = [];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    public $timestamps = false;

    // Relationships
    public function event(){
        return $this->belongsTo(Event::class);
    }
}
