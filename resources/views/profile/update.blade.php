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

                            @if ($errors->any())
                                <div class="">
                                    @foreach ($errors->all() as $error)
                                        <p class="alert alert-danger" role="alert">{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif

                            <div class="search-results">

                                <div class="title">
                                    <h5>Update Profile</h5>
                                </div>

                                <hr>

                                <div>
                                    <div class="mb-4">
                                        
                                        @include('profile.updateBasic')
                                        
                                    </div>

                                    <hr>

                                    {{-- change password --}}
                                    <div class="mb-4">
                                    
                                        @include('profile.updatePassword')
                                    
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="col-3">
                            
                        </div>

                        {{-- suggested friends --}}
                        <div class="col-3 find-friends-container">
                            
                            @include('includes.suggested_friends')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
