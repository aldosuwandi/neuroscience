@extends('app')

@section('content')
    <div class="row">

        <!-- Blog Entries Column -->
        @yield('entries')

        <!-- Blog Sidebar Widgets Column -->
        @include('partials.sidebar')
    </div>

@endsection
