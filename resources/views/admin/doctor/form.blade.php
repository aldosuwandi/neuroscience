@extends('admin')

@section('content')
    <h3>Create New Doctor</h3>
    <hr/>
    @if (is_null($doctor->id))
        {!!Form::open([
            'url'=>'/admin/doctor/create',
            'method'=>'POST',
            'files'=> true
        ])!!}
    @else
        {!!Form::open([
            'url'=>'/admin/doctor/edit',
            'method'=>'POST',
            'files'=> true
        ])!!}
    @endif
    {!!Form::hidden('id',$doctor->id,[])!!}
    <div class="row">
        <div class="col-sm-6">
            <div class="control-group form-group">
                <div class="controls">
                    {!!Form::label('doctor image (280x320)')!!}
                    {!!Form::file('image') !!}
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    {!!Form::label('name')!!}
                    {!!Form::text('name',$doctor->name,[
                        'class' => 'form-control',
                        'id'=>'name',
                        'required data-validation-required-message'=>'Please enter doctor name.'
                    ])
                    !!}
                    {!!$errors->first('name', '<p class="help-block">:message</p>')!!}
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    {!!Form::label('title')!!}
                    {!!Form::text('title',$doctor->title,[
                        'class' => 'form-control',
                        'id'=>'title',
                        'required data-validation-required-message'=>'Please enter doctor title.'
                    ])
                    !!}
                    {!!$errors->first('title', '<p class="help-block">:message</p>')!!}
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    {!!Form::label('birthday')!!}
                    {!!Form::text('birthday',$doctor->birthday,[
                        'class' => 'form-control',
                        'id'=>'birthday',
                        'required data-validation-required-message'=>'Please enter doctor birthday.'
                    ])
                    !!}
                    {!!$errors->first('birthday', '<p class="help-block">:message</p>')!!}
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="control-group form-group">
                <div class="controls">
                    {!!Form::label('institution')!!}
                    {!!Form::text('institution',$doctor->institution,[
                        'class' => 'form-control',
                        'id'=>'institution',
                        'required data-validation-required-message'=>'Please enter doctor institution.'
                    ])
                    !!}
                    {!!$errors->first('institution', '<p class="help-block">:message</p>')!!}
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    {!!Form::label('address')!!}
                    {!!Form::text('address',$doctor->address,[
                        'class' => 'form-control',
                        'id'=>'address',
                        'required data-validation-required-message'=>'Please enter doctor address.'
                    ])
                    !!}
                    {!!$errors->first('address', '<p class="help-block">:message</p>')!!}
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    {!!Form::label('phone')!!}
                    {!!Form::text('phone',$doctor->phone,[
                        'class' => 'form-control',
                        'id'=>'phone',
                        'required data-validation-required-message'=>'Please enter doctor phone.'
                    ])
                    !!}
                    {!!$errors->first('phone', '<p class="help-block">:message</p>')!!}
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    {!!Form::label('email')!!}
                    {!!Form::email('email',$doctor->email,[
                        'class' => 'form-control',
                        'id'=>'email',
                        'required data-validation-required-message'=>'Please enter doctor email.'
                    ])
                    !!}
                    {!!$errors->first('email', '<p class="help-block">:message</p>')!!}
                </div>
            </div>
        </div>
    </div>

    <div class="control-group form-group">
        <div class="controls">
            <label for="education">Education</label>
            <textarea id="education" name="education" class="form-doctor">
                <?php echo $doctor->education; ?>
            </textarea>
        </div>
        {!!$errors->first('education', '<p class="help-block">:message</p>')!!}
    </div>

    <div class="control-group form-group">
        <div class="controls">
            <label for="experience">Experience</label>
            <textarea id="experience" name="experience" class="form-doctor">
                <?php echo $doctor->experience; ?>
            </textarea>
        </div>
        {!!$errors->first('experience', '<p class="help-block">:message</p>')!!}
    </div>

    <div class="control-group form-group">
        <div class="controls">
            <label for="organization">Organization</label>
            <textarea id="organization" name="organization" class="form-doctor">
                <?php echo $doctor->organization; ?>
            </textarea>
        </div>
        {!!$errors->first('organization', '<p class="help-block">:message</p>')!!}
    </div>

    <div class="control-group form-group">
        <div class="controls">
            <label for="training">Training</label>
            <textarea id="training" name="training" class="form-doctor">
                <?php echo $doctor->training; ?>
            </textarea>
        </div>
        {!!$errors->first('training', '<p class="help-block">:message</p>')!!}
    </div>

    <div class="control-group form-group">
        <div class="controls">
            <label for="publication">Publication</label>
            <textarea id="publication" name="publication" class="form-doctor">
                 <?php echo $doctor->publication; ?>
            </textarea>
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