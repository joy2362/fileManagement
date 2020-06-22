@extends('layouts/master')
@section('title')
    Add Post
@endsection
@section('main-content')
<div class="row m-5 ">
    <div class="col-md-4"></div>
    <div class="col-md-4 col-sm-12 col-lg-4 mt-5 mb-4">
        <div class="card p-2 shadow-lg mb-5 rounded">
            <div class="card-header text-center font-weight-bold ">
                <h2>Add Post</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{URL::to('post.store')}}" enctype="multipart/form-data">
                    @csrf
                     <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"  autocomplete="title">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" rows="5" id="description" name="description" autocomplete="description" ></textarea>
                         @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image" autocomplete="image">
                            <label class="custom-file-label" for="image">{{ __('Choose file') }}</label>
                            @error('fileName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                        <input type="hidden" name="id" value="{{Auth::user()->id}}">
                    <div class="form-group">
                        <input type="submit" class="btn btn-outline-primary" value="save" name="save">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>
@endsection

