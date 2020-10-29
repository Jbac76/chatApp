<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Follow;
use App\Models\Profile;
use App\Models\FollowRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
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
    public function index($uname = null)
    {
        if( isset($uname) )
        {
            $user = User::where('uname', $uname)->first();
        }else{
            $user = Auth::user();
        }
        $posts = Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->limit(15)->get();

        $followingIds = Follow::where('follower_id', $user->id )->pluck('following_id');
        $fansIds = Follow::where('following_id', $user->id )->pluck('follower_id');

        $fans = User::whereIn('id', $fansIds)->get();
        $following = User::whereIn('id', $followingIds)->whereNotIn('id', $fansIds)->get();

        return view('profile.index', compact('user', 'posts', 'following', 'fans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $follow_requests = FollowRequest::where('follower_id', auth()->id())->pluck('following_id');
        $follow = Follow::where('follower_id', auth()->id())->pluck('following_id');

        $find_friend = User::where('id', '!=', auth()->id() )
                            ->whereNotIn('id', $follow_requests)
                            ->whereNotIn('id', $follow)
                            ->limit(6)
                            ->get();

        $term = $request->input('term');

        if( !$term )
        {
            return redirect()->back()->whith('term', $term);
        }else{
            $results = User::where('name', 'LIKE', "%{$term}%")->orWhere('uname', 'LIKE', "%{$term}%")->get();
        }

        return view('profile.searchUser', compact('term', 'results', 'find_friend'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function basic(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'uname'=>'required|string|max:25|unique:users,id',
            'email'=>'required|string|email|max:255|unique:users,id',
            'privacy'=>'required|string'
        ]);

        $user = User::find(auth()->id());

        $user->name = $request->input('name');
        $user->uname = $request->input('uname');
        $user->email = $request->input('email');
        $user->privacy = $request->input('privacy');

        $user->save();

        return redirect()->back()->with('info', 'Profile Basic Information Updated');
    }  

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function password( Request $request )
    {
        $request->validate([
            'oldpassword'=>'required',
            'password'=>'required|string|min:8|confirmed',
        ]);
        
        if ( Auth::attempt(['email' => auth()->user()->email, 'password' => $request->input('password')]) ) 
        {
            $user = User::find(auth()->id());
            $user->password = Hash::make($request->input('password'));

            $user->save();

            return redirect()->back()->with('info', 'Password Updated');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update()
    {

        $follow_requests = FollowRequest::where('follower_id', auth()->id())->pluck('following_id');
        $follow = Follow::where('follower_id', auth()->id())->pluck('following_id');

        $find_friend = User::where('id', '!=', auth()->id() )
                            ->whereNotIn('id', $follow_requests)
                            ->whereNotIn('id', $follow)
                            ->limit(6)
                            ->get();

        return view('profile.update', compact('find_friend'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
