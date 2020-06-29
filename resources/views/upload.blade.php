@extends('layouts/master')
@section('title')
    Upload
@endsection
@section('main-content')
<div class="row m-5 ">
    <div class="col-md-3"></div>
    <div class="col-md-6 col-sm-12 col-lg-6 mt-5 mb-4">
        <div class="card p-3 shadow-lg mb-5 rounded">
            <div class="card-header text-center font-weight-bold ">
                <h2>Upload</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{URL::to('file.create')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-bordered" id="item-table">
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input"  id="customFile" name="fileName[]">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </td>
                                <td><button type="button" class="btn btn-info font-weight-bold" name="add" id="addmore" data-toggle="tooltip" data-placement="top">+</button></td>
                            </tr>
                        </table>
		            </div>
                    <div class="form-group">
                    <input type="submit" class="btn btn-outline-primary" value="save" >
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>
@endsection

