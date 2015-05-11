@extends('blog')

@section('entries')
    <div class="col-lg-8">
        <h3>{{$question->question_title}}</h3>
        <p>
            by {{$question->questioner}}
        </p>
        <p><span class="glyphicon glyphicon-time"></span>{{$question->created_at}}</p>
        <hr>
        <p>{{$question->question_text}}</p>
        <hr>
        <h3>Jawaban</h3>
        <div class="well">
            <p>
                by {{$question->answering}}
            </p>
            <p style="font-style: italic">{{$question->answer_text}}</p>
        </div>
    </div>

@stop

