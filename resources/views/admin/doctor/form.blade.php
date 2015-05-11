@extends('admin')

@section('content')
    <h3>Create New Doctor</h3>
    <hr/>
    {!!Form::open([
    'url'=>'/admin/doctor/create',
    'method'=>'POST',
    'files'=> true
    ])!!}
    <div class="row">
        <div class="col-sm-6">
            <div class="control-group form-group">
                <div class="controls">
                    {!!Form::label('doctor image')!!}
                    {!!Form::file('image') !!}
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    {!!Form::label('name')!!}
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
                    {!!Form::label('title')!!}
                    {!!Form::text('title',null,[
                    'class' => 'form-control',
                    'id'=>'title',
                    'required data-validation-required-message'=>'Please enter doctor title.'
                    ])
                    !!}
                    <p class="help-block"></p>
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    {!!Form::label('birthday')!!}
                    {!!Form::text('birthday',null,[
                    'class' => 'form-control',
                    'id'=>'title',
                    'required data-validation-required-message'=>'Please enter doctor birthday.'
                    ])
                    !!}
                    <p class="help-block"></p>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="control-group form-group">
                <div class="controls">
                    {!!Form::label('institution')!!}
                    {!!Form::text('institution',null,[
                    'class' => 'form-control',
                    'id'=>'title',
                    'required data-validation-required-message'=>'Please enter doctor institution.'
                    ])
                    !!}
                    <p class="help-block"></p>
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    {!!Form::label('address')!!}
                    {!!Form::text('address',null,[
                    'class' => 'form-control',
                    'id'=>'title',
                    'required data-validation-required-message'=>'Please enter doctor address.'
                    ])
                    !!}
                    <p class="help-block"></p>
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    {!!Form::label('phone')!!}
                    {!!Form::text('phone',null,[
                    'class' => 'form-control',
                    'id'=>'title',
                    'required data-validation-required-message'=>'Please enter doctor phone.'
                    ])
                    !!}
                    <p class="help-block"></p>
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    {!!Form::label('email')!!}
                    {!!Form::email('email',null,[
                    'class' => 'form-control',
                    'id'=>'title',
                    'required data-validation-required-message'=>'Please enter doctor birthday.'
                    ])
                    !!}
                    <p class="help-block"></p>
                </div>
            </div>
        </div>
    </div>

    <div class="control-group form-group">
        <div class="controls">
            <label for="education">Education</label>
            <textarea id="education" name="education" class="form-doctor"></textarea>
        </div>
        {!!$errors->first('education', '<p class="help-block">:message</p>')!!}
    </div>

    <div class="control-group form-group">
        <div class="controls">
            <label for="experience">Experience</label>
            <textarea id="experience" name="experience" class="form-doctor"></textarea>
        </div>
        {!!$errors->first('experience', '<p class="help-block">:message</p>')!!}
    </div>

    <div class="control-group form-group">
        <div class="controls">
            <label for="organization">Organization</label>
            <textarea id="organization" name="organization" class="form-doctor"></textarea>
        </div>
        {!!$errors->first('organization', '<p class="help-block">:message</p>')!!}
    </div>

    <div class="control-group form-group">
        <div class="controls">
            <label for="training">Training</label>
            <textarea id="training" name="training" class="form-doctor"></textarea>
        </div>
        {!!$errors->first('training', '<p class="help-block">:message</p>')!!}
    </div>

    <div class="control-group form-group">
        <div class="controls">
            <label for="publication">Publication</label>
            <textarea id="publication" name="publication" class="form-doctor"></textarea>
        </div>
        {!!$errors->first('publication', '<p class="help-block">:message</p>')!!}
    </div>

    <hr/>
    <div id="success"></div>
    <!-- For success/fail messages -->
    <button type="submit" class="btn btn-success">Submit</button>
    {!!Form::close()!!}

@stop


@section('script')
    <script>
        $('.form-doctor').editable({
            inlineMode: false,
            imageUploadURL: '/admin/image/upload',
            imageUploadParams: {
                id: 'my_editor'
            }
        });
    </script>
@stop