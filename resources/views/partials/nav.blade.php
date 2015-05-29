
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background: #FCF5DD;">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" style="background:#1A2674;border-color: #1A2674"
                    data-target="#main-navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" style="margin-top: -15px">
                <img width="200" height="50" src="{{asset('/images/logo_0_0.png')}}"/>
            </a>
            <a id="title_brand" class="navbar-brand" href="/">Neuro Center</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="main-navigation">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{url('/events')}}">Event</a>
                </li>
                <li>
                    <a href="{{url('/schedule')}}">Jadwal Praktek</a>
                </li>
                <li>
                    <a href="{{url('/doctors')}}">Dokter</a>
                </li>
                <li>
                    <a href="http://www.siloamhospitals.com/contact-us">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>