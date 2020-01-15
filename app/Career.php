<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

class Career extends Model {

    use Searchable;

    protected $fillable = ['career_category_id', 'position_title', 'description', 'active'];

    protected $with = ['category', 'applicants'];

    public $incrementing = false;

    public static $rules = [
        // Validation rules
    ];

    public static function boot()
    {
        parent::boot();
        
        self::creating(function ($career) {
            $career->id = Str::uuid()->toString();
        });

        static::deleting(function ($career) {
            foreach ($career->applicants as $applicant) {
                $applicant->delete();
            }
        });

    }

    // Relationships
    public function category(){
        return $this->belongsTo(CareerCategory::class, 'career_category_id');
    }

    public function applicants(){
        return $this->hasMany(Applicant::class);
    }

    public function toSearchableArray()
    {
        return [
            'position_title' => $this->position_title,
            'description' => $this->description
        ];
    }
}
