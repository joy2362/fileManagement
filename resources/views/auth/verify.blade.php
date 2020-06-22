@extends('layouts/auth')
@section('title')
Verify
@endsection
@section('css_class')
log_css
@endsection
@section('header')
{{ __('Verify Your Email Address') }}
@endsection
@section('content')
<div class="pt-3">
{{ __('Before proceeding, please check your email for a verification link.') }}
{{ __('If you did not receive the email') }}
</div>
<form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
    @csrf
    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
</form>
@endsection


