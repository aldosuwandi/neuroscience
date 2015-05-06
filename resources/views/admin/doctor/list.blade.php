@extends('admin')

@section('content')
    <h3>Doctor List</h3>
    <hr/>
    <a class="btn btn-primary" href="/admin/doctor/create">Create</a>
    <hr/>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-condensed table-bordered" style="font-size: 14px">
            <thead>
            <tr>
                <th class="col-sm-3">Name</th>
                <th class="col-sm-3">Title</th>
                <th class="col-sm-1">Image URL</th>
                <th class="col-sm-2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($doctors as $doctor)
                <tr>
                    <td>{{$doctor->name}}</td>
                    <td>{{$doctor->title}}</td>
                    <td>{{$doctor->img_url}}</td>
                    <td>
                        <a class="btn btn-sm btn-danger">Edit</a>
                        <a class="btn btn-sm btn-success">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop