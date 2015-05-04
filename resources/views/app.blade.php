<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body>
{{--    <img src="{{asset('/images/csfh_img_9648.jpg')}}" id="bg" alt="">--}}
    @include('partials.nav')
    <div class="container">
        @yield('content')
        @include('partials.footer')
    </div>
	<!-- Scripts -->
	<script src="{{asset('js/jquery.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>
