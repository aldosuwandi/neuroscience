@extends('admin')

@section('content')
    <h3>Event List</h3>
    <hr/>
    <a class="btn btn-primary" href="/admin/event/create">Create</a>
    <hr/>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-condensed table-bordered" style="font-size: 14">
            <thead>
            <tr>
                <th>Name</th>
                <th>Image URL</th>
                <th class="col-sm-4">Link</th>
                <th class="col-sm-3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{$event->name}}</td>
                    <td>{{$event->img_url}}</td>
                    <td>{{$event->link}}</td>
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