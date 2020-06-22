
@extends('layouts/auth')
@section('title')
Reset Password
@endsection
@section('css_class')
log_css
@endsection
@section('header')
{{ __('Reset Password') }}
@endsection
@section('content')
<form method="POST" action="{{ route('password.update') }}">
@csrf
<input type="hidden" name="token" value="{{ $token }}">
<div class="form-group">
    <label for="email" class="col-form-label">{{ __('E-Mail Address') }}</label>
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group ">
    <label for="password" class="col-form-label">{{ __('Password') }}</label>
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group ">
    <label for="password-confirm" class="col-form-label ">{{ __('Confirm Password') }}</label>
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
</div>
<button type="submit" class="btn btn-primary">
    {{ __('Change Password') }}
</button>
</form>
@endsection

