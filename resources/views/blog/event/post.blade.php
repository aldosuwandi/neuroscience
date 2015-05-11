@extends('app')

@section('content')
    <div class="article" style="text-align:justify">
        <h3> <a href="/events/view/{{$event->id}}">{{$event->name}}</a></h3>
        <p><span class="glyphicon glyphicon-time"></span> Dibuat  {{$event->created_at}}</p>
        <hr>
        <p><?php echo $event->text; ?></p>
        <hr>
    </div>
@stop

