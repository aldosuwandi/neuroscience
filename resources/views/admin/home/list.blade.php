@extends('admin')

@section('content')
    <h3>Home Banner List</h3>
    <hr/>
    <a class="btn btn-primary" href="/admin/home/create">Create</a>
    <hr/>
    <div class="row">
        <div class="col-sm-5">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-condensed table-bordered" style="font-size: 14">
                    <thead>
                    <tr>
                        <th class="col-sm-6">Image URL</th>
                        <th class="col-sm-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($homes as $home)
                        <tr>
                            <td>{{$home->img_url}}</td>
                            <td>
                                <a class="btn btn-sm btn-success">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@stop