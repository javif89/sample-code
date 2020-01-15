<?php

namespace App;

use App\Traits\CountryContextAware;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Article extends Model
{
    //use CountryContextAware;

    use Searchable;

    protected $fillable = ['title', 'type', 'external_link', 'summary', 'banner_image_path', 'publish_date', /*'country_code', 'lang_code'*/];

    protected $dates = ['publish_date'];

    protected $appends = ['link'];

    public static $rules = [
        // Validation rules
    ];

    const TYPE_PRESS = 'press';

    public function setPublishDateAttribute($value)
    {
        $this->attributes['publish_date'] = Carbon::createFromFormat('m/d/Y', $value);

    }

    public function scopePress($query)
    {
        return $query->where('type', self::TYPE_PRESS);
    }

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'summary' => $this->summmary
            ];
    }

    public function getLinkAttribute()
    {
        return $this->external_link;
    }
}
