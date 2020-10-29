@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="">

                @include('includes.alerts')

                <div class="home-container">
                    <div class="row">
                        <div class="col-6 main-activity-container">

                            <h5>Status Update</h5>

                            @if ($errors->any())
                                <div class="">
                                    @foreach ($errors->all() as $error)
                                        <p class="alert alert-danger" role="alert">{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif

                            <form action="{{ route('post.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control" id="statusUpdate" name="body" rows="3" placeholder="Status update"></textarea>
                                </div>
                                <button type="submit" class="btn btn-secondary rounded-0 mr-2">Post</button>
                                <button type="button" class="btn btn-link ml-auto">Add photos</button>
                            </form>
                            <hr>

                            {{-- if no posts yet --}}
                            @if( $posts->count() <= 0 )
                                <p class="p-3 mb-2 bg-secondary text-white">No posts yet</p>
                            @else

                                {{-- posts container --}}
                                <div class="container">

                                    @foreach( $posts as $post )
                                    
                                        <div class="posts-container">

                                            <div class="media">
                                                
                                                <img class="align-self-start mr-3 default-dp" src="{{ asset('/img/default.gif') }}" alt="dp">
                                                
                                                <div class="media-body">
                                                    
                                                    <a href="{{ route('profile', [$post->user->uname]) }}"><h6 class="mt-0 mb-2">{{ $post->user->name }}</h6></a>
                                                    
                                                    <div class="mb-0">
                                                        
                                                        <p class="m-0">
                                                            {{ $post->body }}
                                                        </p>
                                                        
                                                        <span><small>Posted {{ $post->created_at->diffForHumans() }}</small></span>
                                                    </div>

                                                    {{-- like button --}}
                                                    <div class="mb-2">

                                                        @if( Auth::user()->hasLikedPost($post) )

                                                        <a href="{{ route('unlikePost', [$post->id]) }}">{{ $post->likes->count() }} Unlike</a>
                                                        
                                                        @else
                                                    
                                                            <a href="{{ route('likePost', [$post->id]) }}">{{ $post->likes->count() }} Like</a>
                                                        
                                                        @endif
                                                    </div>

                                                    {{-- comment count --}}
                                                    <div class="pl-2 mb-0 bg-secondary text-white">
                                                        <small>
                                                            {{ $post->comments->count() }} Comment{!! $post->comments->count() === 1 ? '' : 's' !!}
                                                        </small>
                                                    </div>
                                                    
                                                    <hr>

                                                    {{-- comment container --}}
                                                    <div class="comments">

                                                        @foreach( $post->comments as $comment )

                                                            <div class="media">
                                                    
                                                                <img class="align-self-start mr-3 default-dp" src="{{ asset('/img/default.gif') }}" alt="dp">
                                                                
                                                                <div class="media-body">
                                                                    
                                                                    <a href="{{ route('profile', [$comment->user->uname]) }}"><h6 class="mt-0 mb-2">{{ $comment->user->name }}</h6></a>
                                                                    
                                                                    <div class="mb-0">
                                                                        
                                                                        <p class="m-0">
                                                                            {{ $comment->body }}
                                                                        </p>
                                                                        
                                                                        <span><small>Posted {{ $comment->created_at->diffForHumans() }}</small></span>
                                                                    </div>
                
                                                                    <div class="mb-2">

                                                                        @if( Auth::user()->hasLikedComment($comment) )

                                                                            <a href="{{ route('unlikeComment', [$comment->id]) }}">{{ $comment->likes->count() }} Unlike</a>

                                                                        @else

                                                                            <a href="{{ route('likeComment', [$comment->id]) }}">{{ $comment->likes->count() }} Like</a>

                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <hr>

                                                        @endforeach
                                                    </div>

                                                    {{-- comment form --}}
                                                    <div>
                                                        <form action="{{ route('comment.store', [$post->id]) }}" method="POST">
                                                            @csrf
                                                            <div class="input-group mb-3 rounded-0">
                                                                <input type="text" class="form-control rounded-0" name="comment" placeholder="Comment">
                                                                <div class="input-group-append rounded-0">
                                                                  <button class="btn btn-outline-secondary rounded-0" type="submit">Comment</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <hr> --}}

                                    @endforeach

                                </div>

                            @endif
                        </div>
                        <div class="col-3">
                            
                        </div>
                        <div class="col-3 find-friends-container">
                            <h5>Find Friends</h5>

                            <hr>

                            @if( $find_friend->count() )

                            <div class="card rounded-0">
                                <ul class="list-group list-group-flush">

                                    @foreach( $find_friend as $friend )

                                        <li class="list-group-item">
                                            <div class="media">
                                                <img class="align-self-start mr-3 default-dp" src="{{ asset('/img/default.gif') }}" alt="dp">
                                                <div class="media-body">
                                                    <a href="{{ route('profile', [$friend->uname]) }}"><h6 class="mt-0 mb-0">{{ $friend->name }}</h6></a>

                                                    @if(Auth::user()->hasFollowed($friend->id) )

                                                    <a href="{{ route( 'unfollow', [ $friend->id ] ) }}" class="btn btn-secondary btn-sm ph-2 m-0 rounded-0">Unfollow</a>

                                                @elseif( Auth::user()->hasFollowRequest($friend->id) )
                                                    
                                                    <a href="{{ route( 'unfollow', [ $friend->id ] ) }}" class="btn btn-secondary btn-sm ph-2 m-0 rounded-0">Cancel Request</a>
                                                
                                                @else

                                                    <a href="{{ route( 'follow', [ $friend->id ] ) }}" class="btn btn-secondary btn-sm ph-2 m-0 rounded-0">Follow</a>
                                                @endif

                                                <a href="{{ route( 'follow', [ $friend->id ] ) }}" class="btn btn-primary btn-sm ph-2 m-0 rounded-0">Send Message</a>

                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                              </div>
                        
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
