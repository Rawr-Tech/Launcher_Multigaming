<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Webpatser\Uuid\Uuid;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait, Uuids
    {
        Uuids::boot insteadof EntrustUserTrait;
    }

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password', 'id', 'avatar', 'confirmed', 'confirmation_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function confirm(User $user)
    {
        $user->confirmed = 1;
        $user->confirmation_token = null;
        $user->save();
    }
}
