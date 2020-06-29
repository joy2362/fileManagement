@extends('layouts/master')
@section('title')
    Change Password
@endsection
@section('main-content')
<div class="row m-5 ">
    <div class="col-md-4"></div>
    <div class="col-md-4 col-sm-12 col-lg-4 mt-5 mb-4">
        <div class="card p-3 shadow-lg mb-5 rounded">
            <div class="card-header text-center font-weight-bold ">
                <h2>Change Password</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('password.update')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <label for="oldpassord">{{__('Old Password:')}}</label>
                    <input type="password" name="oldpassord" id="oldpassord" class="form-control @error('oldpassord') is-invalid @enderror" >
                       @error('oldpassord')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                    <label for="password">{{__('New Password:')}}</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" >
                       @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                    <label for="password_confirmation">{{__('Repeat Passwod:')}}</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" >
                       @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                     <input type="hidden" name="user" value="{{auth::id()}}">
                    <div class="form-group">
                    <input type="submit" class="btn btn-outline-primary" value="Update" >
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>
@endsection

