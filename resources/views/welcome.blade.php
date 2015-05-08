<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body style="padding-top: 50px;background: #FFFAE7;">
    @include('partials.nav')
    <header id="myCarousel" class="carousel slide">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            @for($i = 0; $i < count($homes); $i++)
            <div class="item @if($i == 0) active @endif">
                <div class="fill">
                <img src="/banner/{{$homes[$i]->img_url}}" style="width:100%;height: 100%">
                </div>
            </div>
            @endfor
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>
    <style>
        div.wrapper{
            float:left; /* important */
            position:relative; /* important(so we can absolutely position the description div */
        }
        div.description{
            position:absolute; /* absolute position (so we can position it where we want)*/
            bottom:0px; /* position will be on bottom */
            left:0px;
            width:100%;
            /* styling bellow */
            background-color:black;
            font-size:15px;
            color:white;
            opacity:0.6; /* transparency */
            filter:alpha(opacity=60); /* IE transparency */
        }
        p.description_content{
            padding:10px;
            margin:0px;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Our Services
                </h1>
            </div>
            @foreach($clinics as $clinic)
                <div class="col-md-4">
                    <div class='wrapper' style="margin-bottom: 25px;">
                        <!-- image -->
                        <img src="/clinic/{{$clinic->img_url}}" style="max-height: 100%;max-width: 100%">
                        <!-- description div -->
                        <div class='description'>
                            <!-- description content -->
                            <p class='description_content'>
                                <a  href="/clinic/home/{{$clinic->id}}" style="color:#ffffff;;">{{$clinic->name}}</a>
                            </p>
                            <!-- end description content -->
                        </div>
                        <!-- end description div -->
                    </div>
                </div>
            @endforeach
        </div>
        @include('partials.footer')
    </div>
    <!-- Scripts -->
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#myCarousel').carousel({
                interval: 3000
            });
        });
    </script>
</body>
</html>
