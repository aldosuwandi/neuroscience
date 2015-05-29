@extends('admin')

@section('content')
    <h3>Doctor List</h3>
    <hr/>
    <a class="btn btn-primary" href="{{url('/admin/doctor/create')}}">Create</a>
    <hr/>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-condensed table-bordered" style="font-size: 14px">
            <thead>
            <tr>
                <th class="col-sm-3">Name</th>
                <th class="col-sm-3">Title</th>
                <th class="col-sm-3">Email</th>
                <th class="col-sm-2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($doctors as $doctor)
                <tr>
                    <td>
                        <a href="{{url('/admin/doctor/create/'.$doctor->id)}}">
                            {{$doctor->name}}
                        </a>
                    </td>
                    <td>{{$doctor->title}}</td>
                    <td>{{$doctor->email}}</td>
                    <td>
                        <a class="btn btn-sm btn-danger" href="{{url('/admin/doctor/create/'.$doctor->id)}}">Edit</a>
                        <a class="btn btn-sm btn-success" href="{{url('/admin/doctor/delete/'.$doctor->id)}}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop