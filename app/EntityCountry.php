<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntityCountry extends Model
{
    protected $fillable = ['country_id', 'entity_id'];
    public $timestamps = false;

    public static $rules = [
        // Validation rules
    ];

    // Relationships
    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
