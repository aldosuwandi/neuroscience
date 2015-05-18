@extends('app')

@section('content')

    <!-- Team Members Row -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Our Team</h2>
        </div>
        @foreach($doctors as $doctor)
            <div class="col-lg-4 col-sm-6 text-center">
                <img class="img-circle img-responsive img-center" src="/uploads/{{$doctor->img_url}}" alt=""
                     style="width: 200px;height:250px">
                <h3>
                    <a href="/doctors/view/{{$doctor->id}}">
                        {{$doctor->name}}
                    </a>
                </h3>
                <p>{{$doctor->title}}</p>
            </div>
        @endforeach
    </div>

    <hr>

@stop


