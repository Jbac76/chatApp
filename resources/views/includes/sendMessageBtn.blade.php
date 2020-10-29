
    @unless( $user->id === auth()->id() )
        <div>
            <a href="{{ route('message.create', [$user->id]) }}" class="btn btn-secondary btn-sm pl-2 pr-2 pt-0 pb-0 rounded-0">Send this user a message</a>
        </div>
    @endif
