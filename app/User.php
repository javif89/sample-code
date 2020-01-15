<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'country_code', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getIsSuperAttribute()
    {
        return $this->role === 'super';
    }

    public function scopeSuperAdmin($query)
    {
        return $query->where('role', 'super');
    }

    public function scopeCountryAdmin($query)
    {
        return $query->where('role', 'country');
    }

    public function getUnreadAnnouncements()
    {
        $readIds = \DB::table('announcement_user_view')->where('user_id', $this->id)->pluck('announcement_id');
        $roleAttr = $this->isSuper ? 'for_sa' : 'for_csa';
        $coll = Announcement::whereNotIn('id', $readIds)
                ->where('created_by', '!=', $this->id)
                    ->where($roleAttr, true)
                        ->get();
        $user_id = $this->id;
        $coll ->each(function ($item) use ($user_id) {
            $item->markSeen($user_id);
        });

        return $coll;
    }

    public function getLatestAnnouncements($limit = 10)
    {
        $roleAttr = $this->isSuper ? 'for_sa' : 'for_csa';
        return Announcement::where('created_by', '!=', $this->id)
                    ->where($roleAttr, true)
                        ->orderBy('created_at', 'desc')
                            ->take($limit)
                                ->get();
    }

    public function getIsDistributorAttribute()
    {
        return $this->role === 'distributor';
    }

    public function getIsCsaAttribute()
    {
        return $this->role === 'country';
    }

    public function getCountryAttribute()
    {
        if ($this->country_code) {
            return Country::where('code', $this->country_code)->first();
        }
    }
}
