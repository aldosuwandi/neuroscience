@extends('blog')

@section('entries')
    <div class="col-md-8">
        <h1 class="page-header">{{$clinic->name}}
            <a class="btn btn-info" href="/question/create/{{$clinci->id}}" style="float:right">Tanya Dokter</a>
        </h1>
        @foreach($questions as $question)
            <div class="article" style="text-align:justify">
                <h4> <a href="/question/view/{{$question->id}}">{{$question->question_title}}</a></h4>
                <p>oleh {{$question->questioner}} | <span class="glyphicon glyphicon-time"></span>  {{$question->created_at}}</p>
                <p><?php echo substr($question->question_text,0,1000).'....'; ?></p>
                <a class="btn btn-primary btn-sm" href="/question/view/{{$question->id}}">Lihat
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
