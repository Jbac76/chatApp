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

                            <h5>Following</h5>

                            @include('includes.following')
                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
