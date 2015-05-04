@extends('admin')

@section('content')
    <h3>Create New Post</h3>
    <hr/>
    <form name="sentMessage" id="contactForm" novalidate>
        <div class="control-group form-group">
            <label for="clinic">Select Clinic:</label>
            <select class="form-control" id="clinic" name="clinic_id">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
            </select>
        </div>
        <div class="control-group form-group">
            <label for="category">Select Category:</label>
            <select class="form-control" id="category" name="category_id">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
            </select>
        </div>
        <div class="control-group form-group">
            <div class="controls">
                <label>Author:</label>
                <input type="text" class="form-control" id="name"
                       required data-validation-required-message="Please enter your name.">
                <p class="help-block"></p>
            </div>
        </div>
        <div class="control-group form-group">
            <div class="controls">
                <label>Title:</label>
                <input type="text" class="form-control" id="name"
                       required data-validation-required-message="Please enter your name.">
                <p class="help-block"></p>
            </div>
        </div>
        <div class="control-group form-group">
            <div class="controls">
                <label>Text:</label>
                @include('admin.partials.editormenu')
                <div id="editor" class="lead" placeholder="Go ahead…" contenteditable="true"></div>
                {{--<textarea rows="10" cols="100" class="form-control" id="message"--}}
                {{--required data-validation-required-message="Please enter your message"--}}
                {{--maxlength="999" style="resize:none"></textarea>--}}
            </div>
        </div>
        <hr/>
        <div id="success"></div>
        <!-- For success/fail messages -->
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@stop