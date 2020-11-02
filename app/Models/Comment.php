<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['body', 'user_id', 'post_id'];

    public function likes()
    {
        return $this->morphMany('App\Models\Like', 'likeable');
    }

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
