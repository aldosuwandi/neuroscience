@extends('admin')

@section('content')
    <h3>Create New Home Banner</h3>
    <hr/>
    @if (is_null($home->id))
        {!!Form::open([
        'url'=>'/admin/home/create',
        'method'=>'POST',
        'files'=> true
        ])!!}
    @else
        {!!Form::open([
        'url'=>'/admin/home/edit',
        'method'=>'POST',
        'files'=> true
        ])!!}
    @endif
    {!!Form::hidden('id',$home->id,[])!!}
    <div class="control-group form-group">
        <div class="controls">
            {!!Form::label('title')!!}
            {!!Form::text('title',$home->title,[
                'class' => 'form-control',
                'id'=>'title',
                'required data-validation-required-message'=>'Please enter banner title.'
            ])
            !!}
        </div>
        {!!$errors->first('title', '<p class="help-block">:message</p>')!!}
    </div>
    <div class="control-group form-group">
        <div class="controls">
            {!!Form::label('caption')!!}
            {!!Form::text('caption',$home->caption,[
                'class' => 'form-control',
                'id'=>'caption',
                'required data-validation-required-message'=>'Please enter banner caption.'
            ])
            !!}
        </div>
        {!!$errors->first('caption', '<p class="help-block">:message</p>')!!}
    </div>
    <div class="control-group form-group">
        <div class="controls">
            {!!Form::label('URL link')!!}
            {!!Form::text('link',$home->link,[
                'class' => 'form-control',
                'id'=>'link'
            ])
            !!}
        </div>
        {!!$errors->first('link', '<p class="help-block">:message</p>')!!}
    </div>
    <div class="control-group form-group">
        <div class="controls">
            {!!Form::label('banner image (1900x540)')!!}
            {!!Form::file('image') !!}
        </div>
    </div>
    <hr/>
    <div id="success"></div>
    <!-- For success/fail messages -->
    <button type="submit" class="btn btn-success">Submit</button>
    {!!Form::close()!!}
@stop