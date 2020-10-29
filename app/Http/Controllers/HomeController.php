<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\FollowRequest;
use App\Models\Follow;
use App\Models\Post;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $follow_requests = FollowRequest::where('follower_id', auth()->id())->pluck('following_id');
        $follow = Follow::where('follower_id', auth()->id())->pluck('following_id');

        $find_friend = User::where('id', '!=', auth()->id() )
                            ->whereNotIn('id', $follow_requests)
                            ->whereNotIn('id', $follow)
                            ->limit(6)
                            ->get();

        $following = User::whereIn('id', $follow)->get();

        $posts = Post::whereIn('user_id', $follow)
                        ->orWhere('user_id', auth()->id() )
                        ->orderBy('created_at', 'desc')
                        ->limit(15)
                        ->get();

        return view('home', compact('find_friend', 'following', 'posts'));
    }
}
