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
                                        
                                        <h6>Basic Details</h6>


                                        <form method="POST" action="{{ route('update.basic') }}">
                                            @csrf
                    
                                            <div class="form-group row">
                                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="name" type="text" class="form-control rounded-0 @error('name') is-invalid @enderror" name="name" value="{{ auth()->user()->name }}" required autocomplete="name" autofocus>
                    
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="uname" class="col-md-4 col-form-label text-md-right">{{ __('Uname') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="uname" type="text" class="form-control rounded-0 @error('uname') is-invalid @enderror" name="uname" value="{{ auth()->user()->uname }}" required autocomplete="uname" autofocus>
                    
                                                    @error('uname')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                    
                                            <div class="form-group row">
                                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control rounded-0 @error('email') is-invalid @enderror" name="email" value="{{ auth()->user()->email }}" required autocomplete="email">
                    
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="privacy" class="col-md-4 col-form-label text-md-right">Account Privacy</label>
                                                <div class="col-md-6">
                                                    <div class="btn-group btn-group-toggle rounded-0" data-toggle="buttons">
                                                        
                                                        <label class="btn btn-secondary rounded-0 {{ auth()->user()->privacy === 'public' ? 'active' : '' }}">
                                                            <input type="radio" name="privacy" id="public" autocomplete="off" value="public" {{ auth()->user()->privacy === "public" ? "checked" : "" }}> Public
                                                        </label>

                                                        <label class="btn btn-secondary rounded-0 {{ auth()->user()->privacy === 'private' ? 'active' : '' }}">
                                                            <input type="radio" name="privacy" id="private" autocomplete="off" value="private" {{ auth()->user()->privacy === "private" ? "checked" : "" }}> Private
                                                        </label>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-secondary rounded-0">
                                                        Update
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <hr>

                                    <div class="mb-4">
                                    
                                        <h6>Change Password</h6>

                                        <form action="{{ route('update.password') }}">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="oldpassword" class="col-md-4 col-form-label text-md-right">Old Password</label>
                    
                                                <div class="col-md-6">
                                                    <input id="old-password" type="password" class="form-control rounded-0 @error('oldpassword') is-invalid @enderror" name="oldpassword" required autocomplete="oldpassword">
                    
                                                    @error('oldpassword')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
                    
                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control rounded-0 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                    
                                            <div class="form-group row">
                                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control rounded-0" name="password_confirmation" required autocomplete="new-password">
                                                </div>
                                            </div>

                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-secondary rounded-0">
                                                        Update Password
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="col-3">
                            
                        </div>
                        <div class="col-3 find-friends-container">
                            <h5>Find Friends</h5>

                            <hr>
                            
                            @if( $find_friend->count() )
                                <div class="card rounded-0">
                                    <ul class="list-group list-group-flush">

                                        @foreach( $find_friend as $friend )

                                            <li class="list-group-item">
                                                <div class="media">
                                                    <img class="align-self-start mr-3 default-dp" src="{{ asset('/img/default.gif') }}" alt="dp">
                                                    <div class="media-body">
                                                        <a href="{{ route('profile', [$friend->uname]) }}"><h6 class="mt-0 mb-0">{{ $friend->name }}</h6></a>
                                                        @if(Auth::user()->hasFollowed($friend->id) )

                                                            <a href="{{ route( 'unfollow', [ $friend->id ] ) }}" class="btn btn-secondary btn-sm ph-2 m-0 rounded-0">Unfollow</a>

                                                        @elseif( Auth::user()->hasFollowRequest($friend->id) )
                                                            
                                                            <a href="{{ route( 'unfollow', [ $friend->id ] ) }}" class="btn btn-secondary btn-sm ph-2 m-0 rounded-0">Cancel Request</a>
                                                        
                                                        @else

                                                            <a href="{{ route( 'follow', [ $friend->id ] ) }}" class="btn btn-secondary btn-sm ph-2 m-0 rounded-0">Follow</a>
                                                        @endif

                                                        <a href="{{ route( 'follow', [ $friend->id ] ) }}" class="btn btn-primary btn-sm ph-2 m-0 rounded-0">Send Message</a>

                                                    </div>
                                                </div>
                                            </li>

                                        @endforeach
                                    </ul>
                                </div>
                            
                                @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
