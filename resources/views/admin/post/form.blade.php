@extends('admin')

@section('content')
    <h3>Create New Post</h3>
    <hr/>
    @if (is_null($post->id))
        {!!Form::open([
            'url'=>'/admin/post/create',
            'method'=>'POST',
            'files'=> true
        ])!!}
    @else
        {!!Form::open([
            'url'=>'/admin/post/edit',
            'method'=>'POST',
            'files'=> true
        ])!!}
    @endif
    {!!Form::hidden('id',$post->id,[])!!}
    <div class="control-group form-group">
        <label for="clinic">Select Clinic:</label>
        <select class="form-control" id="clinic_id" name="clinic_id">
            Select
            @foreach($clinics as $clinic)
                <option value="{{$clinic->id}}" @if($clinicId == $clinic->id) selected @endif>{{$clinic->name}}</option>
            @endforeach
        </select>
        {!!$errors->first('clinic_id', '<p class="help-block">:message</p>')!!}
    </div>
    @if (!empty($categories))
    <div class="control-group form-group">
        <label for="clinic">Select Category:</label>
        <select class="form-control" id="category_id" name="category_id">
            @foreach($categories as $category)
                @if($post->id == null)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @else
                    <option value="{{$category->id}}"  @if($post->category->id == $category->id) selected @endif>{{$category->name}}</option>
                @endif
            @endforeach
        </select>
        {!!$errors->first('category_id', '<p class="help-block">:message</p>')!!}
    </div>
    @endif
    <div class="control-group form-group">
        <div class="controls">
            {!!Form::label('title')!!}
            {!!Form::text('title',$post->title,[
            'class' => 'form-control',
                'id'=>'title',
                'required data-validation-required-message'=>'Please enter title.'
            ])
            !!}
        </div>
        {!!$errors->first('title', '<p class="help-block">:message</p>')!!}
    </div>
    <div class="control-group form-group">
        <label for="clinic">Select Creator:</label>
        <select class="form-control" id="creator" name="creator">
            Select
            <option value="Unspecified" @if($post->creator == 'Unspecified') selected @endif>Unspecified</option>
            @foreach($creators as $creator)
                <option value="{{$creator->name}}" @if($post->creator == $creator->name) selected @endif>{{$creator->name}}</option>
            @endforeach
        </select>
        {!!$errors->first('creator', '<p class="help-block">:message</p>')!!}
    </div>
    <div class="control-group form-group">
        <div class="controls">
            {!!Form::label('Post Image (900x300)')!!}
            {!!Form::file('image') !!}
        </div>
    </div>
    <div class="control-group form-group">
        <div class="controls">
            {!!Form::label('Text')!!}
            {!!Form::textarea('text',$post->text,[
            'class' => 'form-control',
            'id'=>'text',
            'required data-validation-required-message'=>'Please enter text.',
            ])
            !!}
        </div>
        {!!$errors->first('text', '<p class="help-block">:message</p>')!!}
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
            window.location = "/admin/post/create?clinic="+$('#clinic_id').val();
        });
    </script>
@stop