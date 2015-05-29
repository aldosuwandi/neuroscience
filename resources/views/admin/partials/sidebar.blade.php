<div id="sidebar" class="col-sm-3 col-md-2 sidebar collapse">
    <ul class="nav nav-sidebar">
        <li>
            <a href="{{url('/admin/clinic')}}">Clinic</a>
        </li>
        <li>
            <a href="{{url('/admin/category/list/1')}}">Category</a>
        </li>
        <li>
            <a href="{{url('/admin/post/list/1/1')}}">Post</a>
        </li>
        <li>
            <a href="{{url('/admin/question/list/1')}}">Question</a>
        </li>
        <li>
            <a href="{{url('/admin/home')}}">Home Page</a>
        </li>
        <li>
            <a href="{{url('/admin/schedule')}}">Schedule</a>
        </li>
        <li>
            <a href="{{url('/admin/doctor')}}">Doctor</a>
        </li>
        <li>
            <a href="{{url('/admin/event')}}">Event</a>
        </li>
        <li>
            <a href="{{url('/admin/ads/list/1')}}">Ads</a>
        </li>
        <li>
            <a href="{{url('/admin/config/')}}">Configuration</a>
        </li>
        <li>
            <a href="{{action('Auth\AuthController@getLogout')}}">Logout</a>
        </li>

    </ul>
</div>
