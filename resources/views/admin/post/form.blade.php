@extends('admin')

@section('content')
    <h3>Create New Post</h3>
    <hr/>
    {!!Form::open()!!}
    <div class="control-group form-group">
        <label for="clinic">Select Clinic:</label>
        <select class="form-control" id="clinic_id" name="clinic_id">
            Select
            @foreach($clinics as $clinic)
                <option value="{{$clinic->id}}" @if($clinicId == $clinic->id) selected @endif>{{$clinic->name}}</option>
            @endforeach
        </select>
    </div>
    @if (!empty($categories))
    <div class="control-group form-group">
        <label for="clinic">Select Category:</label>
        <select class="form-control" id="category_id" name="category_id">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    @endif
    <div class="control-group form-group">
        <div class="controls">
            {!!Form::label('title')!!}
            {!!Form::text('title',null,[
            'class' => 'form-control',
                'id'=>'title',
                'required data-validation-required-message'=>'Please enter title.'
            ])
            !!}
            <p class="help-block"></p>
        </div>
    </div>
    <div class="control-group form-group">
        <div class="controls">
            {!!Form::label('creator')!!}
            {!!Form::text('creator',null,[
            'class' => 'form-control',
                'id'=>'creator',
                'required data-validation-required-message'=>'Please enter creator name.'
            ])
            !!}
            <p class="help-block"></p>
        </div>
    </div>
    <div class="control-group form-group">
        <div class="controls">
            {!!Form::label('Text')!!}
            {!!Form::textarea('description',null,[
            'class' => 'form-control',
            'id'=>'text',
            'required data-validation-required-message'=>'Please enter text.',
            ])
            !!}

            <label>Text:</label>
            <textarea id="edit" name="content" class="froala-editor"></textarea>
        </div>
    </div>
    <div id="success"></div>
    <!-- For success/fail messages -->
    <button id="submit_post" class="btn btn-success">Submit</button>
    {!!Form::close()!!}

@stop

@section('script')
    <script>
        $('#text').editable({
            inlineMode: false,
            imageUploadURL: '/admin/image/upload',
            imageUploadParams: {
                id: 'my_editor'
            }

        });

        $('#clinic_id').on('change', function (e) {
            window.location = "/admin/post/create/"+$('#clinic_id').val();
        });
        $('#submit_post').click(function() {
            $('<input/>').attr({
                type: 'text',
                id: 'text',
                name: 'text',
                value: $('#edit').editable('getHTML')
            }).appendTo('form');
            $('form').submit();
        });

    </script>
@stop