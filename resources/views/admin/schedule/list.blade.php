@extends('admin')

@section('content')
    <h3>Schedule List</h3>
    <hr/>
    <a class="btn btn-primary" href="#">Create</a>
    <hr/>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-condensed table-bordered" style="font-size: 14">
                <thead>
                <tr>
                    <th class="col-sm-3">Name</th>
                    <th class="col-sm-3">Clinic</th>
                    <th class="col-sm-1">Day</th>
                    <th class="col-sm-2">Time</th>
                    <th class="col-sm-2">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($schedules as $schedule)
                    <tr>
                        <td>{{$schedule->name}}</td>
                        <td>{{$schedule->clinic}}</td>
                        <td>{{$schedule->day}}</td>
                        <td>{{$schedule->time}}</td>
                        <td>
                            <a class="btn btn-sm btn-danger">Edit</a>
                            <a class="btn btn-sm btn-success">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div align="center">
                <?php echo $schedules->render();?>
            </div>
        </div>
@stop