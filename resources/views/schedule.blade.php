@extends('app')

@section('content')
    <!-- Introduction Row -->
    <div class="row">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Nama Dokter</th>
                <th>Klinik</th>
                <th>Hari Praktek</th>
                <th>Jam Praktek</th>
            </tr>
            </thead>
            <tbody>
            @foreach($schedules as $schedule)
            <tr>
                <td>{{$schedule->name}}</td>
                <td>{{$schedule->clinic}}</td>
                <td>{{$schedule->day}}</td>
                <td>{{$schedule->time}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <hr>
@stop


