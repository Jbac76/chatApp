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

                            @include('includes.posts')
                        </div>

                        {{-- those auth user follows --}}
                        <div class="col-3 find-friends-container">

                            <h5>Following</h5>

                            @include('includes.following')
                        </div>

                        {{-- those auth user can follow --}}
                        <div class="col-3 find-friends-container">
                            <h5>Suggested Friends</h5>

                            <hr>

                            @include('includes.suggested_friends')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
