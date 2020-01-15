<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class EventContent extends Model {

    protected $fillable = ['event_id', 'name', 'text'];

    protected $dates = [];

    public $incrementing = false;

    public static $rules = [
        // Validation rules
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = Str::uuid()->toString();
        });
    }

    // Relationships
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

}
