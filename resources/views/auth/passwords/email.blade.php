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
<form action="{{ route('password.email') }}" method="POST" class="pt-2">
    @csrf
    <div class="form-group">
        <label for="email" class="col-form-label ">{{ __('E-Mail Address') }}</label>
       <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <button type="submit" class="btn btn-outline-primary float-left">
        {{ __('Send Password Reset Link') }}
    </button>
    <a href="{{ route('login') }}" class="float-right btn btn-success" >Go Back </a>
</form>
@endsection
