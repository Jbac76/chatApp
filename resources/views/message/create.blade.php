@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="">

                @include('includes.alerts')

                <div class="home-container">
                    <div class="row">
                        <div class="col-8 main-activity-container">

                            <h5 class="">{{ $user_to->name }}</h5>

                            <hr>

                            @if ($errors->any())
                                <div class="">
                                    @foreach ($errors->all() as $error)
                                        <p class="alert alert-danger" role="alert">{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif

                            {{-- if no posts yet --}}
                            @if( $messages->count() <= 0 )
                                <p class="p-3 mb-2 bg-secondary text-white">No messages yet</p>
                            @else

                                {{-- posts container --}}
                                <div class="messages-container">

                                    <div class="convo-container">

                                        @foreach( $messages as $message )

                                            @if( $message->user_from->id === auth()->id() )
                                                <div class="float-right w-75 mb-2">
                                                    <div class="mb-0">
                                                        <div class="media">                                                        
                                                            <img class="align-self-start mr-3 default-dp rounded-circle" src="{{ asset('/img/default.gif') }}" alt="dp">
                                                            
                                                            <div class="media-body bg-light text-dark border p-3 W-100">
                                                                
                                                                <a href="{{ route('profile', [$message->user_from->uname]) }}"><h6 class="mt-0 mb-2">{{ $message->user_from->name }}</h6></a>
                                                                
                                                                <div class="mb-0">
                                                                    
                                                                    <p class="m-0 text-justify">
                                                                        {{ $message->body }}
                                                                    </p>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>                                                        
                                                        <div class="float-right mr-2 mb-2">
                                                            <small class="font-italic pl-1">{{ $message->created_at->diffForHumans() }}</small>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="clearfix"></div>

                                            @else
                                                <div class="w-75 mb-2">
                                                    <div class="mb-0">
                                                        <div class="media">
                                                        
                                                            <img class="align-self-start mr-3 default-dp rounded-circle" src="{{ asset('/img/default.gif') }}" alt="dp">
                                                            
                                                            <div class="media-body bg-light text-dark border p-3">
                                                                
                                                                <a href="{{ route('profile', [$message->user_from->uname]) }}"><h6 class="mt-0 mb-2">{{ $message->user_from->name }}</h6></a>
                                                                
                                                                <div class="mb-0">
                                                                    
                                                                    <p class="m-0 text-justify">
                                                                        {{ $message->body }}
                                                                    </p>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="float-right mr-2 mb-2">
                                                            <small class="font-italic pl-1">{{ $message->created_at->diffForHumans() }}</small>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                                
                                            @endif

                                        @endforeach

                                    </div>

                                    <hr>

                                </div>

                            @endif

                            <form action="{{ route('message.store', [$user_to->id]) }}" method="POST">
                                @csrf
                                <div class="input-group mb-3 mt-3 rounded-0">
                                    <textarea type="text" class="form-control rounded-0" name="body" placeholder="Message"></textarea>
                                    <div class="input-group-append rounded-0">
                                      <button class="btn btn-outline-secondary rounded-0" type="submit">Send</button>
                                    </div>
                                </div>
                            </form>

                        </div>

                        <div class="col-4 find-friends-container">

                            <h5>Find Friends</h5>

                            <hr>

                            @if( $friends->count() )

                            <div class="card rounded-0">
                                <ul class="list-group list-group-flush">

                                    @foreach( $friends as $friend )

                                        <li class="list-group-item">
                                            <div class="media">
                                                <img class="align-self-start mr-3 default-dp-msg rounded-circle" src="{{ asset('/img/default.gif') }}" alt="dp">
                                                <div class="media-body">
                                                    
                                                    <a href="{{ route('profile', [$friend->uname]) }}"><h6 class="mt-0 mb-0">{{ $friend->name }}</h6></a>

                                                    <a href="{{ route( 'message.create', [ $friend->id ] ) }}" class="btn btn-primary btn-sm ph-2 m-0 rounded-0">Send Message</a>

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
