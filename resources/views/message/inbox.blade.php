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