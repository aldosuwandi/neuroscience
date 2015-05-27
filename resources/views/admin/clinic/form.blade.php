@extends('admin')

@section('content')
    <h3>Create New Clinic</h3>
    <hr/>

    @if (is_null($clinic->id))
    {!!Form::open([
        'url'=>'/admin/clinic/create',
        'method'=>'POST',
        'files'=> true
    ])!!}
    @else
    {!!Form::open([
        'url'=>'/admin/clinic/edit',
        'method'=>'POST',
        'files'=> true
    ])!!}
    @endif
    {!!Form::hidden('id',$clinic->id,[])!!}

    <div class="control-group form-group">
        <div class="controls">
        {!!Form::label('name')!!}
        {!!Form::text('name',$clinic->name,[
            'class' => 'form-control',
            'id'=>'name',
            'required data-validation-required-message'=>'Please enter clinic name.'
            ])
        !!}
        {!!$errors->first('name', '<p class="help-block">:message</p>')!!}
        </div>
    </div>
    <div class="control-group form-group">
        <div class="controls">
            {!!Form::label('description')!!}
            {!!Form::textarea('description',$clinic->description,[
                'class' => 'form-control',
                'id'=>'description',
                'required data-validation-required-message'=>'Please enter clinic name.',
                ])
            !!}
            {!!$errors->first('description', '<p class="help-block">:message</p>')!!}
        </div>
    </div>
    <div class="control-group form-group">
        <div class="controls">
            {!!Form::label('clinic background (700x450)')!!}
            {!!Form::file('image') !!}
            {!!$errors->first('image', '<p class="help-block">:message</p>')!!}
        </div>
    </div>
    <div id="success"></div>
    <!-- For success/fail messages -->
    <button type="submit" class="btn btn-success">Submit</button>
    {!!Form::close()!!}
@stop

@section('script')
    <script>
        $('#description').editable({
            inlineMode: false,
            imageUploadURL: '/admin/image/upload',
            imageUploadParams: {
                id: 'my_editor'
            }

        });
    </script>

@endsection