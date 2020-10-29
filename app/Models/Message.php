<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function user_from()
    {
        return $this->belongsTo('App\Models\User', 'from', 'id');
    }
    public function user_to()
    {
        return $this->belongsTo('App\Models\User', 'to', 'id');
    }

    public function threads()
    {
        return $this->hasOne('App\Models\MessageThread');
    }
}
