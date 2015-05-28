@extends('blog')

@section('entries')
    <div class="col-lg-8">
        <div class="article">
            <h3> <a href="/post/view/{{$post->id}}/{{$post->slug}}">{{$post->title}}</a></h3>
            <p class="lead postAuthor">oleh {{$post->creator}} </p>
            <p><span class="glyphicon glyphicon-time"></span> Dibuat  {{$post->created_at}}</p>
            <hr>
            <p><?php echo $post->text; ?></p>
            <hr>
        </div>
    </div>

@stop

