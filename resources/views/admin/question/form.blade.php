@extends('admin')

@section('content')
    <h3>Answer Form</h3>
    <hr/>
    {!!Form::open([
        'url'=>'/admin/question/edit',
        'method'=>'POST'
    ])!!}
    {!!Form::hidden('id',$question->id,[])!!}

    <div class="control-group form-group">
        <div class="controls">
            {!!Form::label('Penanya')!!}
            {!!Form::text('questioner',$question->questioner,[
                'class' => 'form-control',
                'id'=>'questioner',
                'required data-validation-required-message'=>'Please enter questioner name.'
            ])
            !!}
            {!!$errors->first('questioner', '<p class="help-block">:message</p>')!!}
        </div>
    </div>

    <div class="control-group form-group">
        <div class="controls">
            {!!Form::label('Judul')!!}
            {!!Form::text('question_title',$question->question_title,[
                'class' => 'form-control',
                'id'=>'title',
                'required data-validation-required-message'=>'Please enter title.'
            ])
            !!}
            {!!$errors->first('questioner', '<p class="help-block">:message</p>')!!}
        </div>
    </div>

    <div class="control-group form-group">
        <div class="controls">
            {!!Form::label('Pertanyaan')!!}
            {!!Form::text('question_text',$question->question_text,[
                'class' => 'form-control',
                'id'=>'question_text',
                'required data-validation-required-message'=>'Please enter question.'
            ])
            !!}
            <p class="help-block"></p>
        </div>
    </div>

    <div class="control-group form-group">
        <div class="controls">
            {!!Form::label('Penjawab')!!}
            {!!Form::text('answering',$question->answering,[
                'class' => 'form-control',
                'id'=>'answering',
                'required data-validation-required-message'=>'Please enter answering.'
            ])
            !!}
            <p class="help-block"></p>
        </div>
    </div>

    <div class="control-group form-group">
        <div class="controls">
            {!!Form::label('Jawaban')!!}
            {!!Form::textarea('answer_text',$question->answer_text,[
                'class' => 'form-control',
                'id'=>'answer_text',
                'required data-validation-required-message'=>'Please enter your answer.',
            ])
            !!}
            <p class="help-block"></p>
        </div>
    </div>

    <div id="success"></div>
    <!-- For success/fail messages -->
    <button type="submit" class="btn btn-success">Submit</button>
    {!!Form::close()!!}
@stop

@section('script')
    <script>
        $('#answer_text').editable({
            inlineMode: false,
            imageUploadURL: '/admin/image/upload',
            imageUploadParams: {
                id: 'my_editor'
            }

        });
    </script>

@endsection