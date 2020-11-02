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

                        {{-- those auth user follows --}}
                        <div class="col-3 find-friends-container">

                            {{-- users followed by auth user --}}
                            @include('friends.following')

                        </div>

                        {{-- suggested friends --}}
                        <div class="col-3 find-friends-container">
                          
                            {{-- suggested friends --}}
                            @include('friends.suggested_friends')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
