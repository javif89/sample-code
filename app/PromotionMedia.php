<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PromotionMedia extends Model {

    protected $fillable = ['promotion_id', 'media_type_id', 'path'];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships

}
