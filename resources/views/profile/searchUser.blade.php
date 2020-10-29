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

                            @if ($errors->any())
                                <div class="">
                                    @foreach ($errors->all() as $error)
                                        <p class="alert alert-danger" role="alert">{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif

                            <div class="search-results">

                                <div class="title">
                                    <h5>Search results for "{{ $term }}"</h5>
                                </div>

                                <hr>

                                <div>

                                    @if( $results->count() < 1 )

                                        <p class="alert alert-warning">Opps! No results was found!</p>

                                    @else
                                    
                                        @foreach( $results as $result )

                                        <div class="media">
                                                    
                                            <img class="align-self-start mr-3 default-dp" src="{{ asset('/img/default.gif') }}" alt="dp">
                                            
                                            <div class="media-body">
                                                
                                                <a href="{{ route('profile', [$result->uname]) }}"><h6 class="mt-0 mb-0">{{ $result->name }}</h6></a>
                                                
                                                @if(Auth::user()->hasFollowed($result->id) )

                                                    <a href="{{ route( 'unfollow', [ $result->id ] ) }}" class="btn btn-secondary btn-sm pl-2 pr-2 pt-0 pb-0 m-0 rounded-0">Unfollow</a>
                    
                                                @elseif( Auth::user()->hasFollowRequest($result->id) )
                                                    
                                                    <a href="{{ route( 'unfollow', [ $result->id ] ) }}" class="btn btn-secondary btn-sm pl-2 pr-2 pt-0 pb-0 m-0 rounded-0">Cancel Request</a>
                                                
                                                @else
                    
                                                    <a href="{{ route( 'follow', [ $result->id ] ) }}" class="btn btn-secondary btn-sm pl-2 pr-2 pt-0 pb-0 m-0 rounded-0">Follow</a>
                                                @endif
                    
                                                <a href="{{ route( 'message.create', [ $result->id ] ) }}" class="btn btn-primary btn-sm pl-2 pr-2 pt-0 pb-0 m-0 rounded-0">Message</a>
                
                                            </div>
                                        </div>

                                        <hr>

                                        @endforeach

                                    @endif

                                </div>

                            </div>

                        </div>
                        <div class="col-3">
                            
                        </div>

                        {{-- suggested friends --}}
                        <div class="col-3 find-friends-container">
                            
                            {{-- suggested friends --}}
                            @include('friends.suggested_friends')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
