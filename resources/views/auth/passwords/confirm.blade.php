@extends('layouts/auth')
@section('title')
Verify
@endsection
@section('css_class')
log_css
@endsection
@section('header')
{{ __('Confirm Password') }}
@endsection
@section('content')
<div class="pt-3">
 {{ __('Please confirm your password before continuing.') }}
</div>
 <form method="POST" action="{{ route('password.confirm') }}">
    @csrf
    <div class="form-group ">
        <label for="password" class=" col-form-label ">{{ __('Password') }}</label>

            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>
    <div class="form-group mb-0">
        <button type="submit" class="btn btn-primary">
            {{ __('Confirm Password') }}
        </button>

        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
    </div>
</form>
@endsection


