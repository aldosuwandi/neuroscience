@extends('admin')

@section('content')
    <h3>Clinic List</h3>
    <hr/>
    <a class="btn btn-primary" href="/admin/clinic/create">Create</a>
    <hr/>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-condensed table-bordered" style="font-size: 14">
            <thead>
            <tr>
                <th class="col-sm-3">Name</th>
                <th>Image URL</th>
                <th class="col-sm-2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clinics as $clinic)
                <tr>
                    <td>{{$clinic->name}}</td>
                    <td>{{$clinic->img_url}}</td>
                    <td>
                        <a class="btn btn-sm btn-danger" href="/admin/clinic/create/{{$clinic->id}}">Edit</a>
                        <a class="btn btn-sm btn-success" href="/admin/clinic/delete/{{$clinic->id}}">Delete</a>
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