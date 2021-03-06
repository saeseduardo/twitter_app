<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'username',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected  $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getNameAttribute($value): string
    {
        return ucwords($value);
    }

    public function setNameAttribute($value): string
    {
        return strtolower($value);
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function userLogins()
    {
        return $this->hasMany(UserLogin::class);
    }
}
