@extends('app')

@section('content')
    <div class="container">
        <h3> <a href="{{url('/events/view/'.$event->id)}}/{!!str_slug($event->name)!!}">{{$event->name}}</a></h3>
        <p><span class="glyphicon glyphicon-time"></span> Dibuat  {{$event->created_at}}</p>
        <hr>
        <p><?php echo $event->text; ?></p>
        <hr>
    </div>
@stop

