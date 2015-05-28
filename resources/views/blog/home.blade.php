@extends('blog')

@section('entries')
    <div class="col-md-8">
        <h1 class="page-header">{{$clinic->name}}</h1>
        @if (is_null($posts))
            <div class="article">
                <?php echo $clinic->description; ?>
            </div>
            <hr>
        @else
            @foreach($posts as $post)
                <div class="article">
                    <h3> <a href="/post/view/{{$post->id}}/{{$post->slug}}">{{$post->title}}</a></h3>
                    @if ($post->creator != 'Unspecified')
                    <p class="lead postAuthor">oleh {{$post->creator}} </p>
                    @endif
                    <p><span class="glyphicon glyphicon-time"></span> Dibuat  {{$post->created_at}}</p>
                    <hr>
                    @if (!is_null($post->img_url))
                        <img src="/uploads/{{$post->img_url}}"  class="img-responsive">
                        <hr>
                    @endif
                        <p><?php echo strip_tags(substr($post->text,0,1000)).'....'; ?></p>
                        <a class="btn btn-primary" href="/post/view/{{$post->id}}/{{$post->slug}}">Lihat
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                </div>
                <hr>
            @endforeach
            <div align="center">
                <?php echo $posts->render();?>
            </div>
        @endif
    </div>
@endsection
