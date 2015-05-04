@extends('admin')

@section('content')
    <h3>Create New Clinic</h3>
    <hr/>
    <form name="sentMessage" id="contactForm" novalidate>
        <div class="control-group form-group">
            <div class="controls">
                <label>Name:</label>
                <input type="text" class="form-control" id="name"
                       required data-validation-required-message="Please enter clinic name.">
                <p class="help-block"></p>
            </div>
        </div>
        <div class="control-group form-group">
            <div class="controls">
                <label>Description:</label>
                <textarea rows="10" cols="100" class="form-control" id="message"
                          required data-validation-required-message="Please enter clinic description"
                          maxlength="999" style="resize:none"></textarea>
            </div>
        </div>
        <hr/>
        <div id="success"></div>
        <!-- For success/fail messages -->
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@stop