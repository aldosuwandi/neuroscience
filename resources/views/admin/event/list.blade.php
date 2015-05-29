@extends('admin')

@section('content')
    <h3>Event List</h3>
    <hr/>
    <a class="btn btn-primary" href="{{url('/admin/event/create')}}">Create</a>
    <hr/>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-condensed table-bordered" style="font-size: 14">
            <thead>
            <tr>
                <th>Name</th>
                <th>Date Created</th>
                <th class="col-sm-3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{$event->name}}</td>
                    <td>{{$event->created_at}}</td>
                    <td>
                        @if(!$event->active)
                            <a class="btn btn-sm btn-info" href="{{url('/admin/event/activate/'.$event->id)}}">Activate</a>
                        @else
                            <a class="btn btn-sm btn-default" href="{{url('/admin/event/deactivate/'.$event->id)}}">Deactivate</a>
                        @endif
                        <a class="btn btn-sm btn-danger" href="{{url('/admin/event/create/'.$event->id)}}">Edit</a>
                        <a class="btn btn-sm btn-success" href="{{url('/admin/event/delete/'.$event->id)}}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop