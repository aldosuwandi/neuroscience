@extends('admin')

@section('content')
    <h3>Clinic List</h3>
    <hr/>
    <a class="btn btn-primary" href="{{url('/admin/clinic/create')}}">Create</a>
    <hr/>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-condensed table-bordered" style="font-size: 14">
            <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Date Created</th>
                <th class="col-sm-2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clinics as $clinic)
                <tr>
                    <td>
                        <a href="{{url('/admin/clinic/create/'.$clinic->id)}}">{{$clinic->name}}</a>
                    </td>
                    <td>{!! strip_tags(substr($clinic->description,0,100)) !!}....</td>
                    <td>{{$clinic->created_at}}</td>
                    <td>
                        <a class="btn btn-sm btn-danger" href="{{url('/admin/clinic/create/'.$clinic->id)}}">Edit</a>
                        <a class="btn btn-sm btn-success" href="{{url('/admin/clinic/delete/'.$clinic->id)}}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div align="center">
            <?php echo $clinics->render();?>
        </div>
    </div>
@stop