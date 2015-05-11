<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
    <link href="{{ asset('js/external/google-code-prettify/prettify.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/froala_content.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/froala_editor.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/froala_style.min.css') }}" rel="stylesheet">
</head>
<body>
    @include('admin.partials.nav')
    <div class="container-fluid" >
        <div class="row">
            @include('admin.partials.sidebar')
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="margin-top: -30px">
                @yield('content')
            </div>
        </div>
    </div>
<!-- Scripts -->
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/external/jquery.hotkeys.js')}}"></script>
<script src="{{asset('js/external/google-code-prettify/prettify.js')}}"></script>
<script src="{{asset('js/bootstrap-wysiwyg.min.js')}}"></script>
<script src="{{asset('js/froala_editor.min.js')}}"></script>
<script src="{{asset('js/plugins/tables.min.js')}}"></script>

@yield('script')
</body>
</html>
