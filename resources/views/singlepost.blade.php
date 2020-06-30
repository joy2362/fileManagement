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
            <li class="list-group-item active">
                <h5>Forum
                <a class="btn btn-sm btn-danger float-right" href="{{route('allForum')}}">All Post</a>
                </h5>
            </li>
            <li class="list-group-item mt-5">
                <div class="col-sm-12 ">
                    <div class="card">
                        <div class="card-header text-center"><h4>{{$post->title}}</h4></div>
                        <div class="card-body text-center">
                            @if($post->image)
                                <Button data-toggle="modal" class="mb-3" data-target="#showFullImage">
                                    <img src="{{URL::to($post->image)}}" width="350px">
                                </Button>
                            @endif
                        <p>{{ $post->description}}</p>
                        </div>
                        <div class="card-footer">
                            <h5 class="mb-3">Comments</h5>
                            <div class="col-sm-12">
                            <form action="{{URL::to('post.comment')}}" method="POST">
                                @csrf
                                    <input type="hidden" value="{{auth::id()}}" name="user_id">
                                    <input type="hidden" value="{{$post->id}}" name="post_id">
                                    <textarea class="form-control mb-1 @error('comment') is-invalid @enderror" rows="3" id="comment" placeholder="write comment" name="comment" autocomplete="comment"></textarea>
                                        @error('comment')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    <button class="btn btn-success" type="submit">Comment</button>
                                </form>
                            </div>
                            <div class="col-sm-12 mt-5">
                                @if(count($comment)<=0)
                                <small>No comment yet</small>
                                @else
                                    @foreach ($comment as $row)
                                    <div class="card bg-secondary text-white mb-3">
                                        <div class="card-body">
                                           <div class="float-left">
                                                <h5>{{$row->user->fullname}}</h5>
                                                <p>{{$row->comment}}</p>
                                           </div>
                                            <div class="float-right">
                                                <small>{{\Carbon\Carbon::parse($row->updated_at)->diffForHumans()}}</small>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                      {{ $comment->links() }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </div>
    </div>
</div>

<!-- Modal which is used to display full image-->
<div class="modal fade" id="showFullImage" tabindex="-1" role="dialog" aria-labelledby="showFullImageLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="showFullImageLabel">Full image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <img src="{{URL::to($post->image)}}" id="imagepreview" style="width: 100%; height: 100%;" >
      </div>
    </div>
  </div>
</div>

@endsection

