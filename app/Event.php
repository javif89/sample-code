<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

class Event extends Model
{

    use Searchable;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $with = ['media', 'content', 'products', 'region'];
    protected $keyType = 'string';

    protected $appends = ['link'];
    public $incrementing = false;

    public static $rules = [
        // Validation rules
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = Str::uuid()->toString();
            $model->slug = Str::slug($model->name, '-');
        });

        self::updating(function ($model) {
            $model->slug = Str::slug($model->name, '-');
        });
    }

    // Relationships
    public function media()
    {
        return $this->hasMany(EventMedia::class);
    }

    public function content(){
        return  $this->hasMany(EventContent::class);
    }

    public function type()
    {
        return $this->belongsTo(EventType::class, 'event_type_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(EventProduct::class);
    }

    public function scopeGeneral($query)
    {
        $type  =  EventType::where('name', 'General')->first();
        return $query->where('event_type_id', $type->id);
    }

    public function scopeTradeShows($query)
    {
        $type  =  EventType::where('name', 'TRADE SHOW')->first();
        return $query->where('event_type_id', $type->id);
    }

    public function scopeDemos($query)
    {
        $type  =  EventType::where('name', 'VIRTUAL DEMO')->first();
        return $query->where('event_type_id', $type->id);
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function toSearchableArray()
    {
        return [
            'name' => $this->name
        ];
    }

    // Utility
    /**
     * Return the names of all the content pieces that a product is required to have
     * We can use this function whenever we need to do something related to the content
     * such as creating all the placeholder content for a product when it's created
     */
    public static function getTradeshowContent()
    {
        return [
            'tradeshow_main_description',
            'tradeshow_promo',
            'tradeshow_location',
            'tradeshow_address',
            'tradeshow_latlon',
            'tradeshow_booth',
            'tradeshow_url',
        ];
    }

    /**
     * Return the names of all the media pieces that a product is required to have
     * We can use this function whenever we need to do something related to the media
     * such as creating all the placeholder media for a product when it's created
     */
    public static function getTradeshowMedia()
    {
        return [
            'tradeshow_hero_image',
            'tradeshow_thumbnail_image'
        ];
    }


    public function getContent($contentType){
        $filteredContent = $this->content->where('name', '=', $contentType)->first();
        return $filteredContent;
    }
    public function getMedia($mediaType){
        $filteredMedia = $this->media->where('name', '=', $mediaType)->first();
        return $filteredMedia;
    }

    public function getIsTradeShowAttribute()
    {
        $type  =  EventType::where('name', 'TRADE SHOW')->first();
        return $this->event_type_id == $type->id;
    }

    public function getLinkAttribute()
    {
        if ($this->isTradeShow) {
            return getRoute("tradeshow-page", ['slug' => $this->slug]);
        } else {
            return getRoute("event-page", ['slug' => $this->slug]);
        }
    }

}
