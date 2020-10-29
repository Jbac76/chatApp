{{-- if no posts yet --}}
@if( $posts->count() <= 0 )
<p class="p-3 mb-2 bg-secondary text-white">No posts yet</p>
@else

{{-- posts container --}}
<div class="home-container">

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
                    @include('includes.comments')

                    {{-- comment form --}}
                    @include('includes.comment_form')
                </div>
            </div>
        </div>

        {{-- <hr> --}}

    @endforeach

</div>

@endif