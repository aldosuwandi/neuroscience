@extends('blog')

@section('entries')
    <div class="col-lg-8">
        <div class="article" style="text-align:justify">
            <h3> <a href="/post/view/{{$post->id}}/{{$post->slug}}">{{$post->title}}</a></h3>
            <p class="lead" style="font-size: 17px;margin-bottom:5px">oleh {{$post->creator}} </p>
            <p><span class="glyphicon glyphicon-time"></span> Dibuat  {{$post->created_at}}</p>
            <hr>
            <p><?php echo $post->text; ?></p>
            <hr>
        </div>
    </div>

@stop

