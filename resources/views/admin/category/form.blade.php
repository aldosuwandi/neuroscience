@extends('admin')

@section('content')
    <h3>Create New Category</h3>
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
            <div class="controls">
                <label>Name:</label>
                <input type="text" class="form-control" id="name"
                       required data-validation-required-message="Please enter category name.">
                <p class="help-block"></p>
            </div>
        </div>
        <hr/>
        <div id="success"></div>
        <!-- For success/fail messages -->
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@stop