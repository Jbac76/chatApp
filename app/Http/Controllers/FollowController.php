<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use App\Models\FollowRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function follow($id)
    {
        $user = User::findOrFail($id);

        if( $user->privacy === 'private' )
        {
            $follow_request = new FollowRequest();

            $follow_request->follower_id = auth()->id();
            $follow_request->following_id = $user->id;

            $follow_request->save();

        }else if( $user->privacy === 'public' ){

            $follow = new Follow();

            $follow->follower_id = auth()->id();
            $follow->following_id = $user->id;

            $follow->save();
        }else{

            return redirect()->back()->with('info', 'Opps! Something went wrong');

        }

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function unfollow($id)
    {

        if( Auth::user()->hasFollowed( $id ) )
        {
            Follow::where('follower_id', Auth::id() )->where('following_id', $id)->delete();
            return redirect()->back();

        }else if( Auth::user()->hasFollowRequest( $id ) ) {

            FollowRequest::where('follower_id', Auth::id() )->where('following_id', $id)->delete();
            return redirect()->back();

        }else{

            return redirect()->back()->with('info', 'Opps! Something went wrong');

        }

    }
}
