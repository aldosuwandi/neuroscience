<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body style="background: #FFFAE7;">
    @include('partials.nav')
    <div class="container">
        @yield('content')
        @include('partials.footer')
    </div>
	<!-- Scripts -->
	<script src="{{asset('js/jquery.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
    @yield('script')
</body>
</html>
