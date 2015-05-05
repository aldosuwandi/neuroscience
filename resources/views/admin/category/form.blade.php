@extends('admin')

@section('content')
    <h3>Create New Category</h3>
    <hr/>
    <div class="row">
        <div class="col-sm-5">
            {!!Form::open()!!}
            @if(is_null($clinicId))
                <div class="control-group form-group">
                    <label for="clinic">Select Clinic:</label>
                    <select class="form-control" id="clinic_id" name="clinic_id">
                        @foreach($clinics as $clinic)
                            <option value="{{$clinic->id}}">{{$clinic->name}}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            <div class="control-group form-group">
                <div class="controls">
                    {!!Form::label('name')!!}
                    {!!Form::text('name',null,[
                    'class' => 'form-control',
                    'id'=>'name',
                    'required data-validation-required-message'=>'Please enter category name.'
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