@extends('app')

@section('content')
    <div class="container">
        <h1 class="page-header">Event List</h1>
        @foreach($events as $event)
            <div class="article">
                <h3> <a href="/events/view/{{$event->id}}/{!!str_slug($event->name)!!}">{{$event->name}}</a></h3>
                <p><span class="glyphicon glyphicon-time"></span> Dibuat  {{$event->created_at}}</p>
                <hr>
                <p><?php echo strip_tags(substr($event->text,0,1000)).'....'; ?></p>
                <a class="btn btn-primary" href="/events/view/{{$event->id}}/{!!str_slug($event->name)!!}">Lihat
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
                <hr>
            </div>
        @endforeach

        <div align="center">
            <?php echo $events->render();?>
        </div>
    </div>
@endsection



