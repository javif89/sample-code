<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class EventType extends Model {

    protected $fillable = ['name'];

    protected $dates = [];
    public $timestamps = false;

    public static $rules = [
        // Validation rules
    ];

    // Relationships
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
