@extends('layouts/auth')
@section('title')
Registation
@endsection
@section('css_class')
signup_css
@endsection
@section('header')
{{ __('Registation') }}
@endsection
@section('content')
<form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="fullname">{{ __('Full Name:') }}</label>
        <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror"  required autocomplete="fullname" autofocus value="{{ old('name') }}"  id="fullname">
          @error('fullname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="username">{{ __('User Name:') }}</label>
        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"  required autocomplete="username" autofocus value="{{ old('name') }}"  id="username">
          @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="email" class="">{{ __('E-Mail Address:') }}</label>
        <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" id="email">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label >{{ __('Gender:') }}</label>
        <div class="custom-control custom-radio custom-control-inline ">
            <input type="radio" name="gender" value="male" id="male" required class="custom-control-input @error('gender') is-invalid @enderror">
            <label class="custom-control-label" for="male">Male</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" name="gender" value="Female" id="Female" class="custom-control-input">
            <label class="custom-control-label" for="Female">Female</label>
        </div>
        @error('gender')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="password">{{ __('Password') }}</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" id="password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="password-confirm">{{ __('Confirm Password') }}</label>
        <input type="password" name="password_confirmation" class="form-control" id="password-confirm" required autocomplete="new-password">
    </div>
    <label>Profile Picture</label>
    <div class="custom-file mb-3">
        <input type="file" class="custom-file-input @error('image') is-invalid @enderror"" id="customFile" name="image" required accept="image/*">
            <label class="custom-file-label" for="customFile">Choose file</label>
        @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
         <button type="submit" class="btn btn-outline-primary">
            {{ __('Register') }}
        </button>
    <a class="btn btn-danger float-right" href="{{ route('login') }}">Sign in</a>
    <p class="float-right">Already member? </p>
</form>
@endsection
