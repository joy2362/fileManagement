@extends('layouts/master')
@section('title')
    Forum
@endsection
@section('main-content')

<div class="row ml-1 mt-4">
    <div class="col-md-3 ">
        <div class="jumbotron shadow-lg text-center" style="background: #dfe6e9">
            <div class="profile-pic ">
                <img src="{{URL::to(auth::user()->image)}}" alt="Profile Image" class="rounded-circle" style="height: 150px; width: 150px;">
            </div>
            <h2 class="pt-4 title"> {{auth::user()->fullname}} </h2>
            <hr class="my-4">
            <h2 class="profileShow">Email: {{auth::user()->email}} </h2>
            <h2 class="profileShow">Total File: {{$totalFile}} </h2>
        </div>
    </div>
    <div class="col-md-9 ">
        <div class="list-group">
            <li class="list-group-item active">Latest Forum Topics</li>
            @foreach ($post as $row)
                <a href="#" class="list-group-item list-group-item-action"> {{ $row->title}}</a>
            @endforeach
            {{ $post->links() }}
        </div>
    </div>
</div>

@endsection

