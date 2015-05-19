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
                    <h3> <a href="/post/view/{{$post->id}}/{{$post->slug}}">{{$post->title}}</a></h3>
                    @if ($post->creator != 'Unspecified')
                    <p class="lead" style="font-size: 17px;margin-bottom:5px">oleh {{$post->creator}} </p>
                    @endif
                    <p><span class="glyphicon glyphicon-time"></span> Dibuat  {{$post->created_at}}</p>
                    <hr>
                    @if (!is_null($post->img_url))
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="/uploads/{{$post->img_url}}" width="180" height="120">
                            </div>
                            <div class="col-sm-9">
                                <p><?php echo strip_tags(substr($post->text,0,1000)).'....'; ?></p>
                                <a class="btn btn-primary" href="/post/view/{{$post->id}}/{{$post->slug}}">Lihat
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div>
                    @else
                        <p><?php echo strip_tags(substr($post->text,0,1000)).'....'; ?></p>
                        <a class="btn btn-primary" href="/post/view/{{$post->id}}/{{$post->slug}}">Lihat
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    @endif
                    <hr>
                </div>
            @endforeach
            <div align="center">
                <?php echo $posts->render();?>
            </div>
        @endif



    </div>
@endsection
