<h6>Basic Details</h6>

<form method="POST" action="{{ route('update.basic') }}" class="mt-4">
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