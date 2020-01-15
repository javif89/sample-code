<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    protected $fillable = ['id'];

    public $timestamps = false;
    public $incrementing = false;

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships
    public function regions()
    {
        return $this->belongsToMany(Region::class, 'entity_regions');
    }

    public function translations()
    {
        return $this->hasMany(Translation::class);
    }

    public function countries()
    {
        return $this->belongsToMany(Country::class, 'entity_countries');
    }
}
