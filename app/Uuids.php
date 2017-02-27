<?php
/**
 * Created by PhpStorm.
 * User: hubert_i
 * Date: 27/02/2017
 * Time: 15:06
 */

namespace App;
use Illuminate\Support\Facades\Config;
use Webpatser\Uuid\Uuid;

trait Uuids
{
    /**
     * Boot function from laravel.
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($user)
        {
            $user->id = str_replace('-', '', Uuid::generate(3, $user->email, Uuid::NS_DNS));
        });
        static::deleting(function ($user)
        {
            if (!method_exists(Config::get('auth.model'), 'bootSoftDeletes'))
                $user->roles()->sync([]);
            return true;
        });
    }
}