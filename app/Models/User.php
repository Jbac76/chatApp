<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'uname', 'email', 'password', 'privacy',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function hasLikedPost( Post $post )
    {
        return (bool) $post->likes->where('likeable_id', $post->id )
                            ->where( 'likeable_type', get_class( $post ) )
                            ->where('user_id', $this->id)
                            ->count();
    }

    public function hasLikedComment( Comment $comment )
    {
        return (bool) $comment->likes->where('likeable_id', $comment->id )
                            ->where( 'likeable_type', get_class( $comment ) )
                            ->where('user_id', $this->id)
                            ->count();
    }

    public function hasFollowed( $id )
    {
        return (bool) Follow::where('follower_id', $this->id )->where('following_id', $id)->count();
    }

    public function hasFollowRequest( $id )
    {
        return (bool) FollowRequest::where('follower_id', $this->id )->where('following_id', $id)->count();
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }
}
