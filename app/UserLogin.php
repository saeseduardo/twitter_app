<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLogin extends Model
{
    protected $table= 'user_logins';
    protected $fillable = ['user_id', 'ip_server'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
