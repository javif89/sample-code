<?php namespace App;

use App\Events\ProductModified;
use function foo\func;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use Cache;

class ProductContent extends Model
{

    use Searchable;

    protected $fillable = ['id', 'product_id', 'name', 'text', 'country_code', 'lang_code'];

    protected $dates = [];

    public $incrementing = false;

    public static $rules = [
        // Validation rules
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            if (!$model->id) {
                $model->id = Str::uuid()->toString();
            }
        });

        self::saved(function ($model) {
            // notify superadmins about this action
            if ($model->product) {
                if (Cache::lock('product-mod-' . $model->product->id, 30)->get()) {
                    \Log::info('Event prod ' . $model->product->id);
                    event(new ProductModified($model->product->name, \Auth::user()));
                    Cache::lock('product-mod-' . $model->product->id)->release();
                }
            } else {
                \Log::info('Event no product ' . $model->id);
            }
        });
    }

    public function scopeCountry($query, $countryCode)
    {
        return $query->where('country_code', $countryCode);
    }

    // Relationships
    public function getTranslations()
    {
        return DB::table('content_translations')
            ->where('content_id', $this->id)
            ->get();
    }


    public function toSearchableArray()
    {
        return [
            'text' => $this->text
        ];
    }

    /**
     * Search promotions with regard of currently logged in admin type
     *
     * @param $query
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function performSearch($query)
    {
        $user = \Auth::user();
        $query = self::search($query);
        if ($user->cannot('superadmin')) {
            $query->where('country_code', $user->country_code);
        }

        return $query->get();

    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
