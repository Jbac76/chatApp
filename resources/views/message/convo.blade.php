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