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

                            <h5 class="">
                                {{ $user_to->name }} 

                                @if(Auth::user()->hasFollowed($user_to->id) )

                                    <a href="{{ route( 'unfollow', [ $user_to->id ] ) }}" class="btn btn-secondary btn-sm pl-2 pr-2 pt-0 pb-0 m-0 rounded-0">Unfollow</a>

                                @elseif( Auth::user()->hasFollowRequest($user_to->id) )
                                    
                                    <a href="{{ route( 'unfollow', [ $user_to->id ] ) }}" class="btn btn-secondary btn-sm pl-2 pr-2 pt-0 pb-0 m-0 rounded-0">Cancel Request</a>
                                
                                @else

                                    <a href="{{ route( 'follow', [ $user_to->id ] ) }}" class="btn btn-secondary btn-sm pl-2 pr-2 pt-0 pb-0 m-0 rounded-0">Follow</a>

                                @endif
                            </h5>

                            <hr>

                            @if ($errors->any())
                                <div class="">
                                    @foreach ($errors->all() as $error)
                                        <p class="alert alert-danger" role="alert">{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif

                            {{-- renders the inbox --}}
                            @include('message.inbox')

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

                            @include('friends.following')
                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
