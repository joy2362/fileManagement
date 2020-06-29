@extends('layouts/master')
@section('title')
    Profile
@endsection
@section('main-content')
<div class="container">
      <div class="card mt-5">
        <h5 class="card-header text-center">User Profile Info</h5>
        <div class="card-body">
          <div class="row">
            <div class="col-md-3 pt-3">
              <div class="profile-pic text-center">
                <img src="{{URL::to(auth::user()->image)}}" alt="Profile Image" class="rounded-circle" style="height: 150px; width: 150px;">
                <br>
                <button  class="btn btn-success btn-sm mt-4" data-toggle="modal" data-target="#exampleModal">Change Profile</button>
              </div>
            </div>
            <div class="col-md-7 offset-1 pt-4">
              <div class="profile-info">
                <!-- User's info Table -->
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">Info</th>
                      <th scope="col">Details</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">Name</th>
                      <td>{{auth::user()->fullname}}</td>
                    </tr>

                    <tr>
                      <th scope="row">Email</th>
                      <td>{{auth::user()->email}}</td>
                    </tr>

                    <tr>
                      <th scope="row">Gender</th>
                      <td>{{auth::user()->gender}}</td>
                    </tr>

                    <tr>
                      <th scope="row">Join with us</th>
                      <td>{{ Str::before(Auth::user()->created_at, ' ') }}</td>
                    </tr>

                    <tr>
                      <th scope="row">Total Token</th>
                      <td>0</td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change profile picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{URL::to('profile.update')}}" enctype="multipart/form-data">
        @csrf
      <input type="hidden" value="{{auth::id()}}" name='old_id'>
      <div class="modal-body">
          <div class="form-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="customFile" name="image" autocomplete="image">
                <label class="custom-file-label" for="customFile">{{ __('Choose file') }}</label>
                    @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection
