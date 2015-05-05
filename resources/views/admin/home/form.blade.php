@extends('admin')

@section('content')
    <h3>Create New Home Banner</h3>
    <hr/>
    {!!Form::open([
        'url'=>'/admin/home/create',
        'method'=>'POST',
        'files'=> true
    ])!!}
    <div class="control-group form-group">
        <div class="controls">
            {!!Form::label('banner image')!!}
            {!!Form::file('image') !!}
        </div>
    </div>
    <hr/>
    <div id="success"></div>
    <!-- For success/fail messages -->
    <button type="submit" class="btn btn-success">Submit</button>
    {!!Form::close()!!}
@stop