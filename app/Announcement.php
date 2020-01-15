<?php 

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{

    const TYPE_FEATURE = 'feature';
    const TYPE_IMPROVEMENT = 'improvement';
    const TYPE_BUG = 'bug';

    protected $guarded = ['id'];


    public static $types = [
        self::TYPE_IMPROVEMENT => 'Improvement',
        self::TYPE_FEATURE => 'Feature',
        self::TYPE_BUG => 'Bug',
    ];

    public function getTypeNameAttribute()
    {
        return self::$types[$this->type] ?? $this->type;
    }

    public function markSeen($user_id)
    {
        return \DB::table('announcement_user_view')->insert(
            [
                'announcement_id' => $this->id,
                'user_id' => $user_id,
                'created_at' => Carbon::now()->toDateTimeString()
            ]);
    }

    public function scopeUnsentEmails($query)
    {
        return $query->where('to_email', 1)->where('sent', 0);
    }

}
