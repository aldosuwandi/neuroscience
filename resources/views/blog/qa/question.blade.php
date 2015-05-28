@extends('blog')

@section('topSidebar')
    <div class="well">
        <h4>Discussion</h4>
        <a class="btn btn-info" href="/question/create/{{$clinic->id}}">Tanya Dokter</a>
    </div>
@endsection

@section('entries')
    <div class="col-md-8">
        <h2 class="page-header">Tanya Jawab {{$clinic->name}}</h2>
        @foreach($questions as $question)
            <div class="article">
                <h4>
                    <a href="/question/view/{{$clinic->id}}/{{$clinic->slug}}/{{$question->id}}/{!!str_slug($question->question_title)!!}">
                        {{$question->question_title}}
                    </a>
                </h4>
                <p>oleh {{$question->questioner}} | <span class="glyphicon glyphicon-time"></span>  {{$question->created_at}}</p>
                <p><?php echo substr($question->question_text,0,1000).'....'; ?></p>
                <a class="btn btn-primary btn-sm" href="/question/view/{{$clinic->id}}/{{$clinic->slug}}/{{$question->id}}/{!!str_slug($question->question_title)!!}">
                    Lihat
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
                <hr>
            </div>
        @endforeach
        <div align="center">
            <?php echo $questions->render();?>
        </div>
    </div>
@endsection

