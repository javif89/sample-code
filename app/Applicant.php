<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Applicant extends Model {

    use SoftDeletes;

    protected $guarded = ['id'];

    protected $with = ['educationLevel'];
    
    public static $rules = [
        // Validation rules
    ];

    // Relationships
    public function educationLevel(){
        return $this->belongsTo(EducationLevel::class, 'education_level_id');
    }

}
