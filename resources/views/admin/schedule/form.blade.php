@extends('admin')

@section('content')
    <h3>Create New Schedule</h3>
    <hr/>
    <div class="row">
        <div class="col-sm-5">
        {!!Form::open()!!}
        <div class="control-group form-group">
            <div class="controls">
                {!!Form::label('Doctor name')!!}
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
                {!!Form::label('clinic')!!}
                {!!Form::text('clinic',null,[
                    'class' => 'form-control',
                    'id'=>'clinic',
                    'required data-validation-required-message'=>'Please enter clinic.'
                    ])
                !!}
                <p class="help-block"></p>
            </div>
        </div>
        <div class="control-group form-group">
            <div class="controls">
                {!!Form::label('day')!!}
                {!!Form::text('day',null,[
                    'class' => 'form-control',
                    'id'=>'day',
                    'required data-validation-required-message'=>'Please enter clinic.'
                ])
                !!}
                <p class="help-block"></p>
            </div>
        </div>
        <div class="control-group form-group">
            <div class="controls">
                {!!Form::label('time')!!}
                {!!Form::text('time',null,[
                    'class' => 'form-control',
                    'id'=>'time',
                    'required data-validation-required-message'=>'Please enter time.'
                ])
                !!}
                <p class="help-block"></p>
            </div>
        </div>
        <div id="success"></div>
        <!-- For success/fail messages -->
        <button type="submit" class="btn btn-success">Submit</button>
        {!!Form::close()!!}
        </div>
    </div>
@stop