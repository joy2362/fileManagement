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
                <button type="submit" class="btn btn-success btn-sm mt-4">Change Profile</button>
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
@endsection
