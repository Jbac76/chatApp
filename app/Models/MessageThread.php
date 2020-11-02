<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageThread extends Model
{
    public function messages()
    {
        return $this->belongsTo('App\Models\Message');
    }
}
