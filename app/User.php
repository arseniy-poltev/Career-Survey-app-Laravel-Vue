<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const LEVEL_ADMIN = 5;

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'access_level', 'business_name', 'business_address'
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
     * Orders created by user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function surveys()
    {
        return $this->hasMany(Survey::class);
    }

    public function getPrice()
    {
        switch ($this->access_level) {
            case 5:
            case 4:
                return 0;
            case 3:
                return 55;
            case 2:
                return 110;
            default:
                return 220;
        }
    }

    public function isAdmin() : bool
    {
        return $this->access_level === self::LEVEL_ADMIN;
    }
}
