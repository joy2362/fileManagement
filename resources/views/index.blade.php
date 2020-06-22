@extends('layouts/master')
@section('title')
    Home
@endsection
@section('main-content')
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card-deck">
            <div class="card " style="background:#b2bec3" >
            <div class="card-body text-center about_card">
                <h2>{{ Auth::user()->maxCapacity }} mb</h2>
                <p class="card-text">Capacity</p>
            </div>
            </div>
            <div class="card " style="background:#b2bec3">
            <div class="card-body text-center about_card">
                <h2>{{ Auth::user()->fileSize }} mb</h2>
                <p class="card-text">Total Used</p>
            </div>
            </div>
            <div class="card " style="background:#b2bec3">
                <div class="card-body text-center about_card">
                    <h2>{{$totalFile}}</h2>
                    <p class="card-text">Total Files</p>
                </div>
            </div>
              <div class="card " style="background:#b2bec3">
                <div class="card-body text-center about_card">
                    <h2>0</h2>
                    <p class="card-text">Total Downloads</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row text-center">
    <div class="col-sm-1"></div>
    <div class="col-md-10 mt-3 mb-2" >
        <table class="table table-hover table-responsive  w-100 d-block d-md-table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Uploaded</th>
                    <th>Type</th>
                    <th>Size(mb)</th>
                    <th >Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($FilesInfo as $files)
                <tr>
                    <td>{{($files->Name)}}</td>
                    <td>{{($files->created_at)}}</td>
                    <td>{{($files->extention)}}</td>
                    <td>{{($files->fileSize)}}</td>
                    <td>
                        <a href="{{URL::to('file.edit/'.$files->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="{{URL::to('file.download/'.$files->id)}}" class="btn btn-success"><i class="fas fa-cloud-download-alt"></i></a>
                        <a href="{{URL::to('file.destroy/'.$files->id)}}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $FilesInfo->links() }}
    </div>
    <div class="col-sm-1"></div>
</div>
@endsection
