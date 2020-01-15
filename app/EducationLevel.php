<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationLevel extends Model {

    protected $fillable = ['level'];
    public $timestamps = false;

    public static $rules = [
        // Validation rules
    ];
    // Relationships

}
