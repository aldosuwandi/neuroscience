@extends('admin')

@section('content')
    <h3>Create New Event</h3>
    <hr/>
    @if (is_null($event->id))
        {!!Form::open([
            'url'=>'/admin/event/create',
            'method'=>'POST',
            'files'=> true
        ])!!}
    @else
        {!!Form::open([
            'url'=>'/admin/event/edit',
            'method'=>'POST',
            'files'=> true
        ])!!}
    @endif
    {!!Form::hidden('id',$event->id,[])!!}
        <div class="control-group form-group">
            <div class="controls">
                {!!Form::label('name')!!}
                {!!Form::text('name',$event->name,[
                    'class' => 'form-control',
                    'id'=>'name',
                    'required data-validation-required-message'=>'Please enter event name.'
                ])
                !!}
            </div>
            {!!$errors->first('name', '<p class="help-block">:message</p>')!!}
        </div>
        <div class="control-group form-group">
            <div class="controls">
                {!!Form::label('event banner')!!}
                {!!Form::file('image') !!}
            </div>
            {!!$errors->first('image', '<p class="help-block">:message</p>')!!}
        </div>
        <div class="control-group form-group">
            <div class="controls">
                <textarea id="edit" name="text">
                    <?php echo $event->text; ?>
                </textarea>
            </div>
            {!!$errors->first('text', '<p class="help-block">:message</p>')!!}
        </div>
        <hr/>
        <div id="success"></div>
        <!-- For success/fail messages -->
        <button  type="submit" class="btn btn-success">Submit</button>
        {!!Form::close()!!}
@stop

@section('script')
    <script>
        $('#edit').editable({
            inlineMode: false,
            imageUploadURL: '/admin/image/upload',
            imageUploadParams: {
                id: 'my_editor'
            }

        });
    </script>
@stop