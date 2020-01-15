<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PromotionContent extends Model {

    protected $fillable = ['promotion_id', 'name', 'text'];

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
    }

    // Relationships
    public function getTranslations()
    {
        return DB::table('content_translations')
            ->where('content_id', $this->id)
            ->get();
    }
}
