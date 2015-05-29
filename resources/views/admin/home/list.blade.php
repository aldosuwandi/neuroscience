@extends('admin')

@section('content')
    <h3>Home Banner List</h3>
    <hr/>
    <a class="btn btn-primary" href="{{url('/admin/home/create')}}">Create</a>
    <hr/>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-condensed table-bordered" style="font-size: 14">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Caption</th>
                    <th>Link</th>
                    <th>Date Created</th>
                    <th class="col-sm-2">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($homes as $home)
                    <tr>
                        <td>
                            <a href="{{url('/admin/home/create/'.$home->id)}}">
                                {{$home->title}}
                            </a>
                        </td>
                        <td>{{$home->caption}}</td>
                        <td>{{$home->link}}</td>
                        <td>{{$home->created_at}}</td>
                        <td>
                            <a class="btn btn-sm btn-danger" href="{{url('/admin/home/create/'.$home->id)}}">Edit</a>
                            <a class="btn btn-sm btn-success" href="{{url('/admin/home/delete/'.$home->id)}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop