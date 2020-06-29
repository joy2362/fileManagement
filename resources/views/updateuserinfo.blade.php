@extends('layouts/master')
@section('title')
    Change Information
@endsection
@section('main-content')
<div class="row m-5 ">
    <div class="col-md-4"></div>
    <div class="col-md-4 col-sm-12 col-lg-4 mt-5 mb-4">
        <div class="card p-3 shadow-lg mb-5 rounded">
            <div class="card-header text-center font-weight-bold ">
                <h2>Change Information</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('information.update')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="fullname">{{__('Full Name:')}}</label>
                        <input type="text" name="fullname" id="fullname" class="form-control @error('fullname') is-invalid @enderror" value="{{auth::user()->fullname}}">
                        @error('fullname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">{{__('E-mail:')}}</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{auth::user()->email}}">
                        @error('email')
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

