@extends('admin')

@section('content')
    <h3>Create New Clinic</h3>
    <hr/>
    {!!Form::open()!!}
    <div class="control-group form-group">
        <div class="controls">
        {!!Form::label('name')!!}
        {!!Form::text('name',null,[
            'class' => 'form-control',
            'id'=>'name',
            'required data-validation-required-message'=>'Please enter clinic name.'
            ])
        !!}
        <p class="help-block"></p>
        </div>
    </div>
    <div class="control-group form-group">
        <div class="controls">
            {!!Form::label('description')!!}
            {!!Form::textarea('description',null,[
                'class' => 'form-control',
                'id'=>'description',
                'required data-validation-required-message'=>'Please enter clinic name.',
                'maxlength'=>255,
                'style'=>'resize:none'
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