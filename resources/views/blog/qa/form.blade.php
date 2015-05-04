@extends('blog')

@section('entries')

<!-- Contact Form -->
<!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <div class="col-md-8">
        <h3>Ask The Doctors (Memory Clinic)</h3>
        <form name="sentMessage" id="contactForm" novalidate>
            <div class="control-group form-group">
                <div class="controls">
                    <label>Full Name:</label>
                    <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
                    <p class="help-block"></p>
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label>Email Address:</label>
                    <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label>Message:</label>
                    <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                </div>
            </div>
            <div class="control-group form-group">
                <img src="{{captcha_src()}}" alt="captcha"/>
                <br/><br/>
                <label>Please enter image above : </label>
                <input type="text"  size="5" class="input-sm" id="captcha" required data-validation-required-message="Please enter your name.">
                <p class="help-block"></p>
            </div>
            <hr/>
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>

    <br/>

<!-- /.row -->
@stop