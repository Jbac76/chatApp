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