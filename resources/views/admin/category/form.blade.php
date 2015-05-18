@extends('admin')

@section('content')
    <h3>Create New Category</h3>
    <hr/>
    <div class="row">
        <div class="col-sm-5">
            @if (is_null($category->id))
                {!!Form::open([
                    'url'=>'/admin/category/create',
                    'method'=>'POST'
                ])!!}
            @else
                {!!Form::open([
                    'url'=>'/admin/category/edit',
                    'method'=>'POST'
                ])!!}
            @endif
            {!!Form::hidden('id',$category->id,[])!!}
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
                    {!!Form::text('name',$category->name,[
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