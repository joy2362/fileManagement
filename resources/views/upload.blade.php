@extends('layouts/master')
@section('title')
    Upload
@endsection
@section('main-content')
<div class="row m-5 ">
    <div class="col-md-4"></div>
    <div class="col-md-4 col-sm-12 col-lg-4 mt-5 mb-4">
        <div class="card p-3 shadow-lg mb-5 rounded">
            <div class="card-header text-center font-weight-bold ">
                <h2>Upload</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{URL::to('file.create')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('fileName') is-invalid @enderror" id="customFile" name="fileName"    autocomplete="fileName">
                            <label class="custom-file-label" for="customFile">{{ __('Choose file') }}</label>
                             @error('fileName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
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

