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

                            <h5 class="">Messagese</h5>

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
                                <div class="container">


                                </div>

                            @endif
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
