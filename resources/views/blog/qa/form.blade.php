@extends('blog')

@section('entries')

<!-- Contact Form -->
<!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <div class="col-md-8">
        <h3>Ask The Doctors ({{$clinic->name}})</h3>

        {!!Form::open([
            'url'=>'/question/create',
            'method'=>'POST'
        ])!!}
        {!!Form::hidden('clinic_id',$clinic->id,[])!!}
        <div class="control-group form-group">
            <div class="controls">
                {!!Form::label('Nama Lengkap')!!}
                {!!Form::text('questioner',null,[
                    'class' => 'form-control',
                    'id'=>'questioner',
                    'required data-validation-required-message'=>'Please enter name.'
                ])
                !!}
                {!!$errors->first('questioner', '<p class="help-block">:message</p>')!!}
            </div>
        </div>

        <div class="control-group form-group">
            <div class="controls">
                {!!Form::label('Email Address')!!}
                {!!Form::email('email',null,[
                    'class' => 'form-control',
                    'id'=>'email',
                    'required data-validation-required-message'=>'Please enter email.'
                ])
                !!}
                {!!$errors->first('email', '<p class="help-block">:message</p>')!!}
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
                {!!$errors->first('question_title', '<p class="help-block">:message</p>')!!}
            </div>
        </div>

        <div class="control-group form-group">
            <div class="controls">
                {!!Form::label('Pertanyaan')!!}
                {!!Form::textarea('question_text',null,[
                    'class' => 'form-control',
                    'id'=>'question_text',
                    'required data-validation-required-message'=>'Please enter message.'
                ])
                !!}
                {!!$errors->first('question_text', '<p class="help-block">:message</p>')!!}
            </div>
        </div>

        <div class="control-group form-group">
            {!! app('captcha')->display(); !!}
            {{--<img src="{{captcha_src()}}" alt="captcha"/>--}}
            {{--<br/><br/>--}}
            {{--<label>Please enter image above : </label>--}}
            {{--<input type="text"  size="5" class="input-sm" id="captcha" name="captcha">--}}
            {!!$errors->first('g-recaptcha-response', '<p class="help-block">:message</p>')!!}
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        {!!Form::close()!!}

    </div>

    <br/>

<!-- /.row -->
@stop