@extends('admin')

@section('content')
    <h3>Create New Ads</h3>
    <hr/>
    <div class="row">
        <div class="col-sm-5">
            @if (is_null($ads->id))
                {!!Form::open([
                    'url'=>'/admin/ads/create',
                    'method'=>'POST',
                    'files'=>'true'
                ])!!}
            @else
                {!!Form::open([
                    'url'=>'/admin/ads/edit',
                    'method'=>'POST'
                ])!!}
            @endif
            {!!Form::hidden('id',$ads->id,[])!!}
            {!!Form::hidden('clinicId',$clinicId,[])!!}
            @if(!empty($clinics))
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
                    {!!Form::text('name',$ads->name,[
                        'class' => 'form-control',
                        'id'=>'name',
                        'required data-validation-required-message'=>'Please enter ads name.'
                    ])
                    !!}
                    {!!$errors->first('name', '<p class="help-block">:message</p>')!!}
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    {!!Form::label('link')!!}
                    {!!Form::text('link',$ads->link,[
                        'class' => 'form-control',
                        'id'=>'link',
                        'required data-validation-required-message'=>'Please enter ads link.'
                    ])
                    !!}
                    {!!$errors->first('link', '<p class="help-block">:message</p>')!!}
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    {!!Form::label('Ads Banner (740x320)')!!}
                    {!!Form::file('image') !!}
                    {!!$errors->first('image', '<p class="help-block">:message</p>')!!}
                </div>
            </div>
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-success">Submit</button>
            {!!Form::close()!!}
        </div>
    </div>
@stop