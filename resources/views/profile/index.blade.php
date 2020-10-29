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

                            <h5>Status Update</h5>

                            @include('includes.post_form')

                            {{-- shows posts and comments --}}
                            @include('includes.posts')

                        </div>

                        {{-- shows a send message button --}}
                        <div class="col-3 find-friends-container">
                            
                            @include('includes.fans')

                        </div>

                        <div class="col-3 find-friends-container">

                            <h5>Following</h5>

                            {{-- fans aka followers --}}
                            @include('includes.following')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
