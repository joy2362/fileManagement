@extends('layouts/master')
@section('title')
    Update
@endsection
@section('main-content')
<div class="row m-5 ">
    <div class="col-md-4"></div>
    <div class="col-md-4 col-sm-12 col-lg-4 mt-5 mb-4">
        <div class="card p-3 shadow-lg mb-5 rounded">
            <div class="card-header text-center font-weight-bold ">
                <h2>Rename</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{URL::to('file.update')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <label for="Name">{{__('Write new name:')}}</label>
                    <input type="text" name="Name" id="Name" class="form-control @error('Name') is-invalid @enderror" value="{{$userFile->Name}}">
                       @error('Name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <input type="hidden" name="fileId" value="{{$userFile->id}}">
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

