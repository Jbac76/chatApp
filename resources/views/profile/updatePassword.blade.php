<h6>Change Password</h6>

<form action="{{ route('update.password') }}" method="POST" class="mt-4">
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
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm New Password') }}</label>

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