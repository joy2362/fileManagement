@extends('layouts/master')
@section('title')
    Feadback
@endsection

@section('main-content')
<div class="row mt-5 mb-5">
    <div class="col-sm-12">
        <h3 class="text-center">Feadback</h3>
    </div>
</div>
<div class="container">
    <div class="row ">
        <div class="col-md-4 text-center" style="color:#576574;">
            <img src='img/owner/joy.jpg' class="rounded-circle" height="175" width="175px">
            <p class="owner_name mt-2">Abdullah Zahid</p>
            <p class='owner_designaton'> Laravel Developer</p>
            <p><i class="fas fa-map-marker-alt"></i> Dhaka, Bangladesh</p>
            <p><i class="fas fa-phone-alt"></i> Phone: +880 1780134797</p>
            <p><i class="fas fa-at"></i> </span>Email: abdullahzahidjoy@gmail.com</p>
        </div>
        <div class="col-md-8">
            <form method="post" action='{{route('user.feadback')}}'>
                @csrf
                <div class="row">
                    <div class="col-sm-6 form-group">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" autocomplete="name" value="{{auth::user()->fullname}}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-sm-6 form-group">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" autocomplete="email" value="{{auth::user()->email}}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <textarea class="form-control @error('comments') is-invalid @enderror" name="comments" placeholder="Comment" rows="5" autocomplete="comments"></textarea>
                    @error('comments')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <button class="btn btn-primary pull-right" type="submit">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

