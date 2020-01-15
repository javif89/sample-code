<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name', 'code', 'language_id', 'region_id', 'enabled'];
    public $timestamps = false;
    protected $appends = ['available_languages'];

    public static $rules = [
        // Validation rules
    ];

    // Relationships
    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    public function languages(){
        return $this->belongsToMany(Language::class);
    }

    // Query scopes
    public function scopeEnabled($query)
    {
        return $query->where('enabled', true);
    }

    public function scopeDisabled($query)
    {
        return $query->where('enabled', false);
    }

    public static function getForList($enabled = 1)
    {
        return \DB::table('countries')
            ->where('countries.enabled', $enabled)
                ->join('languages', 'countries.language_id', '=', 'languages.id')
                    ->join('regions', 'countries.region_id', '=', 'regions.id')
                        ->select('countries.*', 'languages.name as language', 'regions.name as region')
                            ->get();
    }

    public function getAvailableLanguagesAttribute()
    {
        return $this->languages()
                ->get()
                    ->prepend($this->language)
                        ->unique();
    }

    public function getDefaultLanguageAttribute()
    {
        return $this->availableLanguages->first();
    }
}

