<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CareerCategory extends Model {

    protected $fillable = ['name'];

    public $timestamps = false;

    public static $rules = [
        // Validation rules
    ];

    public static function boot()
    {
        parent::boot();

        // Delete careers under category
        static::deleting(function ($category) { 
            foreach ($category->careers as $career) {
                $career->delete();
            }
        });
    }
    // Relationships
    public function careers(){
        return $this->hasMany(Career::class);
    }

}
