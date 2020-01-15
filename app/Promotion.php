<?php namespace App;

use App\Events\PromotionCreated;
use App\Events\PromotionDeleted;
use App\Events\PromotionSaved;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

class Promotion extends Model
{

    use Searchable;

    protected $guarded = ['id'];

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

        self::created(function ($model) {
            // notify superadmins about this action
            event(new PromotionCreated($model->name, \Auth::user()));
        });

        self::updated(function ($model) {
            // notify superadmins about this action
            event(new PromotionSaved($model->name, \Auth::user()));
        });

        self::deleted(function ($model) {
            // notify superadmins about this action
            event(new PromotionDeleted($model->name, \Auth::user()));
        });
    }

    // Relationships
    public function contents()
    {
        return $this->hasMany(PromotionContent::class, 'promotion_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_promotions');
    }

    public function media()
    {
        return $this->belongsToMany(MediaType::class, 'promotion_media');
    }

    public function getProducts()
    {
        return DB::table('product_promotions')
            ->where('promotion_id', $this->id)
            ->get();
    }

    public function getMedia()
    {
        return DB::table('promotion_media')
            ->where('promotion_id', $this->id)
            ->get();
    }


    /**
     * Search promotions with regard of currently logged in admin type
     *
     * @param $query
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function performSearch($query, $countryCode = null)
    {
        $user = \Auth::user();
        $query = self::search($query)->get();
        if (!$countryCode) {
            if ($user->cannot('superadmin')) {
                $query->where('country_code', $user->country_code);
            }
        } else {
            $query->where('country_code', $countryCode);
        }

        return $query->all();

    }


    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'body' => $this->body,
            'banner_body' => $this->banner_body
        ];
    }
}
