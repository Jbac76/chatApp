<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Follow;
use App\Models\User;
use App\Models\MessageThread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
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
        $follow = Follow::where('follower_id', auth()->id() )->pluck('following_id');
        $fans = Follow::where('following_id', auth()->id() )->pluck('follower_id');

        $friends = User::whereIn('id', $follow)->orWhereIn('id', $fans)->get();

        $messages = Message::where( 'from', auth()->id() )->orWhere( 'to', auth()->id() )->get();

        // $threads = 

        return view('message.index', compact('friends', 'messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( $user_id )
    {
        $user_to = User::findOrFail($user_id);

        $follow = Follow::where('follower_id', auth()->id() )->pluck('following_id');
        $fans = Follow::where('following_id', auth()->id() )->pluck('follower_id');

        $friends = User::whereIn('id', $follow)->orWhereIn('id', $fans)->get();

        $messages = Message::where( 'from', $user_to->id)->where( 'to', auth()->id() )
                            ->orWhere(function ($query) use($user_to) {
                                    $query->where( 'to', $user_to->id)
                                            ->where( 'from', auth()->id() );
                                })
                            ->get();

        return view( 'message.create', compact('user_to', 'messages', 'friends') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user_id)
    {
        $user = User::findOrFail( $user_id );

        $request->validate([
            'body' => 'required'
        ]);

        $thread = MessageThread::where( 'user_one', $user_id)->where( 'user_two', auth()->id() )
                            ->orWhere(function ($query) use($user_id) {
                                    $query->where( 'user_two', $user_id)
                                            ->where( 'user_one', auth()->id() );
                                })->first();
                                
        $message = new Message();
        

        $message->body = $request->input('body');
        $message->from = auth()->id();
        $message->to = $user->id;

        if( $thread ){

            $message->thread_id = $thread->thread_id;

        }else{

            $thread = new MessageThread();
            $thread->user_one = $user->id;
            $thread->user_two = auth()->id();

            $thread->save();
        }

        $message->thread_id = $thread->id;

        $message->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
