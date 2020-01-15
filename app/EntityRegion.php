<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntityRegion extends Model
{
    protected $fillable = ['region_id', 'entity_id'];
    public $timestamps = false;

    public static $rules = [
        // Validation rules
    ];

    // Relationships
    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
