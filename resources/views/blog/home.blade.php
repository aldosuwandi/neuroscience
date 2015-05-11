@extends('blog')

@section('entries')
    <div class="col-md-8">
        <h1 class="page-header">{{$clinic->name}}</h1>
        @if (is_null($posts))
            <div class="article" style="text-align:justify">
                <?php echo $clinic->description; ?>
            </div>
        @else
            @foreach($posts as $post)
                <div class="article" style="text-align:justify">
                    <h3> <a href="/post/view/{{$post->id}}">{{$post->title}}</a></h3>
                    <p class="lead" style="font-size: 17px;margin-bottom:5px">oleh {{$post->creator}} </p>
                    <p><span class="glyphicon glyphicon-time"></span> Dibuat  {{$post->created_at}}</p>
                    <hr>
                    <p><?php echo strip_tags(substr($post->text,0,1000)).'....'; ?></p>
                    <a class="btn btn-primary" href="/post/view/{{$post->id}}">Lihat
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                    <hr>
                </div>
            @endforeach
            <div align="center">
                <?php echo $posts->render();?>
            </div>
        @endif



    </div>
@endsection
