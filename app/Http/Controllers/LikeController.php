<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * likePost.
     *
     * @param  \ $post_id
     * @return \ redirect back
     */
    public function likePost($post_id)
    {
        $post = Post::findOrFail($post_id);

        if(!Auth::user()->hasLikedPost($post))
        {
            $post->likes()->create([
                'likeable_id' => $post->id,
                'likeable_type' => get_class($post),
                'user_id' => Auth::id()
            ]);
        }

        return redirect()->back();
    }
  
    /**
     * unlikePost.
     *
     * @param  \ $post_id
     * @return \ redirect back
     */
    public function unlikePost($post_id)
    {
        $post = Post::findOrFail($post_id);

        if(Auth::user()->hasLikedPost($post))
        {
           $post->likes()
                ->where('likeable_id', $post->id)
                ->where('likeable_type', get_class($post))
                ->where('user_id', Auth::id())
                ->delete();
        }

        return redirect()->back();
    }

    /**
     * likeComment.
     *
     * @param \  $comment_id
     * @return \ redirect back
     */
    public function likeComment($comment_id)
    {
        $comment = Comment::findOrFail($comment_id);

        if(!Auth::user()->hasLikedComment($comment))
        {
            $comment->likes()->create([
                'likeable_id' => $comment->id,
                'likeable_type' => get_class($comment),
                'user_id' => Auth::id()
            ]);
        }

        return redirect()->back();
    }

      /**
     * unlikeComment.
     *
     * @param  \ $comment_id
     * @return \ redirect back
     */
    public function unlikeComment($comment_id)
    {
        $comment = Comment::findOrFail($comment_id);

        if( Auth::user()->hasLikedComment($comment) )
        {
           $comment->likes()
                ->where('likeable_id', $comment->id)
                ->where('likeable_type', get_class($comment))
                ->where('user_id', Auth::id())
                ->delete();
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        //
    }
}
