<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Soved\Laravel\Magic\Auth\Traits\CanMagicallyLogin;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Soved\Laravel\Magic\Auth\Contracts\CanMagicallyLogin as CanMagicallyLoginContract;

class User extends Authenticatable implements CanMagicallyLoginContract
{
    use Notifiable, CanMagicallyLogin;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'locale',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * Get the logs for the user.
     */
    public function logs()
    {
        return $this->hasMany('App\Log');
    }

    /**
     * Get the orders for the user.
     */
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
