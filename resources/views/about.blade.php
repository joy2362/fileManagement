@extends('layouts/master')
@section('title')
    Contract Us
@endsection

@section('main-content')
<div class="row mt-5 mb-5">
    <div class="col-sm-12">
        <h3 class="text-center">Contact Us</h3>
    </div>
</div>
<div class="container">
     <div class="row ">
    <div class="col-md-4" style="color:#576574;">
      <p><i class="fas fa-map-marker-alt"></i> Dhaka, Bangladesh</p>
      <p><i class="fas fa-phone-alt"></i> Phone: +880 1780134797</p>
      <p><i class="fas fa-at"></i> </span>Email: abdullahzahidjoy@gmail.com</p>
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
      <br>
      <div class="row">
        <div class="col-md-12 form-group">
          <button class="btn btn-primary pull-right" type="submit">Send</button>
        </div>
      </div>
    </div>
</div>
@endsection
