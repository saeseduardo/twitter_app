<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = ['user_id', 'message'];
    
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
