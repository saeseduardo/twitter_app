<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tweet extends Model
{
    protected $fillable = ['user_id', 'message'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
