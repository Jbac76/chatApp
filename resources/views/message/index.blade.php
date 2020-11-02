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

                            {{-- renders conversation --}}
                            @include('message.convo')
                            
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
