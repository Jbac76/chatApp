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

                            {{-- post form --}}
                            @include('post.post_form')

                            {{-- renders posts and comments --}}
                            @include('post.posts')

                        </div>

                        {{-- shows a send message button --}}
                        <div class="col-3 find-friends-container">
                            
                            {{-- renders followers of auth user --}}
                            @include('friends.fans')

                        </div>

                        <div class="col-3 find-friends-container">

                            {{-- fans aka followers --}}
                            @include('friends.following')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
