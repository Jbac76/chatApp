@if( $user->id === Auth::id() )

    <h5>My Fans</h5>

@else

    <h5><a href="{{ route('profile', [$user->uname]) }}">{{ $user->name }}</a>'s Fans</h5>

@endif

<hr>

@if( $fans->count() )
    <div class="card rounded-0">
        <ul class="list-group list-group-flush">

            @foreach( $fans as $friend )

                <li class="list-group-item">
                    <div class="media">
                        
                        <img class="align-self-start mr-3 default-dp" src="{{ asset('/img/default.gif') }}" alt="dp">
                        
                        <div class="media-body">
                            <a href="{{ route('profile', [$friend->uname]) }}"><h6 class="mt-0 mb-0">{{ $friend->name }}</h6></a>
                            
                            @if(Auth::user()->hasFollowed($friend->id) )

                                <a href="{{ route( 'unfollow', [ $friend->id ] ) }}" class="btn btn-secondary btn-sm pl-2 pr-2 pt-0 pb-0 m-0 rounded-0">Unfollow</a>

                            @elseif( Auth::user()->hasFollowRequest($friend->id) )
                                
                                <a href="{{ route( 'unfollow', [ $friend->id ] ) }}" class="btn btn-secondary btn-sm pl-2 pr-2 pt-0 pb-0 m-0 rounded-0">Cancel Request</a>
                            
                            @else

                                <a href="{{ route( 'follow', [ $friend->id ] ) }}" class="btn btn-secondary btn-sm pl-2 pr-2 pt-0 pb-0 m-0 rounded-0">Follow</a>
                            
                            @endif

                            <a href="{{ route( 'message.create', [ $friend->id ] ) }}" class="btn btn-primary btn-sm pl-2 pr-2 pt-0 pb-0 m-0 rounded-0">Message</a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endif