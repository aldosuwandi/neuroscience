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
            <label>Text:</label>
            @include('admin.partials.editormenu')
            <div id="editor" class="lead"  contenteditable="true"
                 style="height: 400px;max-height: 400px">
            </div>
        </div>
    </div>
    <div id="success"></div>
    <!-- For success/fail messages -->
    <button id="submit_post" class="btn btn-success">Submit</button>
    {!!Form::close()!!}

@stop

@section('script')
    <script>
        $('#clinic_id').on('change', function (e) {
            window.location = "/admin/post/create/"+$('#clinic_id').val();
        });
        $('#submit_post').click(function() {
            $('<input/>').attr({
                type: 'text',
                id: 'text',
                name: 'text',
                value: $('#editor').html()
            }).appendTo('form');
            $('form').submit();
        });

    </script>
@stop