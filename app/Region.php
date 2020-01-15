<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model {

    protected $fillable = ['name', 'code'];
    public $timestamps = false;

    public static $rules = [
        // Validation rules
    ];

    // Relationships

    public function entities()
    {
        return $this->belongsToMany(Entity::class);
    }

    public function countries()
    {
        return $this->hasMany(Country::class);
    }
}
