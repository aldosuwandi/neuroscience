@extends('admin')

@section('content')
    <h3>Create New Doctor</h3>
    <hr/>
    <div class="row">
        <div class="col-sm-5">
        {!!Form::open([
        'url'=>'/admin/doctor/create',
        'method'=>'POST',
        'files'=> true
        ])!!}
        <div class="control-group form-group">
            <div class="controls">
                {!!Form::label('name')!!}
                {!!Form::text('name',null,[
                'class' => 'form-control',
                'id'=>'name',
                'required data-validation-required-message'=>'Please enter doctor name.'
                ])
                !!}
                <p class="help-block"></p>
            </div>
        </div>
        <div class="control-group form-group">
            <div class="controls">
                {!!Form::label('title')!!}
                {!!Form::text('title',null,[
                'class' => 'form-control',
                'id'=>'title',
                'required data-validation-required-message'=>'Please enter doctor title.'
                ])
                !!}
                <p class="help-block"></p>
            </div>
        </div>
        <div class="control-group form-group">
            <div class="controls">
                {!!Form::label('doctor image')!!}
                {!!Form::file('image') !!}
            </div>
        </div>
        <hr/>
        <div id="success"></div>
        <!-- For success/fail messages -->
        <button type="submit" class="btn btn-success">Submit</button>
        {!!Form::close()!!}
        </div>
    </div>
@stop