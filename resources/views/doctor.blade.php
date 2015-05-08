@extends('app')

@section('content')

    <!-- Team Members Row -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Our Team</h2>
        </div>
        @foreach($doctors as $doctor)
            <div class="col-lg-4 col-sm-6 text-center">
                <img class="img-circle img-responsive img-center" src="/doctor/{{$doctor->img_url}}" alt="">
                <h3>{{$doctor->name}}</h3>
                <p>{{$doctor->title}}</p>
            </div>
        @endforeach
    </div>

    <hr>

@stop


