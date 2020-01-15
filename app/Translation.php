<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model {

    protected $fillable = ['language_id', 'text'];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships
    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }
}
