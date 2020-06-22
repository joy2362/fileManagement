@extends('layouts/auth')
@section('title')
Login
@endsection
@section('css_class')
log_css
@endsection
@section('header')
{{ __('Login') }}
@endsection
@section('content')
<form action="{{ route('login') }}" method="POST" >
    @csrf
    <div class="form-group">
        <label for="username">{{ __('User Name') }}</label>
        <input type="text" name="username" required autocomplete="username" autofocus value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" id="username">
        @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="password">{{ __('Password') }}</label>
        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>
    <button type="submit" class="btn btn-outline-primary">
        {{ __('Login') }}
    </button>
    @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
    @endif
    @if (Route::has('register'))
        <a class="btn btn-danger float-right" href="{{ route('register') }}">{{ __('Register') }}</a>
        @endif
</form>
@endsection

