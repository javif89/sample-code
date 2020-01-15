<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{

    protected $fillable = ['name', 'native_name', 'code', 'enabled'];
    public $timestamps = false;

    public static $rules = [
        // Validation rules
    ];

    // Relationships

    public function translations()
    {
        return $this->belongsToMany(Translation::class);
    }

    public function countries()
    {
        return $this->belongsToMany(Country::class);
    }

    // Query scopes
    public function scopeEnabled($query){
        return $query->where('enabled', true);
    }
}
