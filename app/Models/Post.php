<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['body', 'user_id'];
    
    public function likes()
    {
        return $this->morphMany('App\Models\Like', 'likeable');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
