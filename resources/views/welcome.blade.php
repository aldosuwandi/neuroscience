<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body id="welcomeBody">
    @if (!is_null($event))
    <div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">{{$event->name}}</h4>
                </div>
                <a href="{{url('/events/view/'.$event->id)}}">
                    <img  class="img-responsive" src="{{url('/uploads/'.$event->img_url)}}"  style="max-height: 100%;max-width: 100%">
                </a>
            </div>
        </div>
    </div>
    @endif
    @include('partials.nav')
    <header id="myCarousel" class="carousel slide">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            @for($i = 0; $i < count($homes); $i++)
            <div class="item @if($i == 0) active @endif">
                <div class="fill">
                    <a href="{{url($homes[$i]->link)}}">
                        <img  src="{{url('/uploads/'.$homes[$i]->img_url)}}" title="{{$homes[$i]->title}}" class="img-responsive"
                             alt="{{$homes[$i]->caption}}" style="margin:auto;height:auto">
                    </a>
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
    <div id="clinicContainer" class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Our Services
                </h1>
            </div>
            @foreach($clinics as $clinic)
                <div class="col-md-4">
                    <div class='wrapper'>
                        <!-- image -->
                        <a href="{{url('/clinic/home/'.$clinic->id.'/'.$clinic->slug)}}">
                            <img src="{{url('/uploads/'.$clinic->img_url)}}" class="img-responsive imgClinic">
                        </a>
                        <!-- description div -->
                        <div class='description'>
                            <!-- description content -->
                            <p class='description_content'>
                                <a href="{{url('/clinic/home/'.$clinic->id.'/'.$clinic->slug)}}">{{$clinic->name}}</a>
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
            @if (!is_null($event))
                $('#myModal').modal('show');
            @endif
        });
    </script>
</body>
</html>
