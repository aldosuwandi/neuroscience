@extends('blog')

@section('entries')
    <div class="col-md-8">

        <h1 class="page-header">
            Memory Clinic
        </h1>

        <!-- First Blog Post -->
        <h2>
            <a href="/post">Apa Itu Memory Clinic ?</a>
        </h2>
        <p class="lead">
            by <a href="index.php">Dr. Budiman</a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:00 PM</p>
        <hr>
        <img class="img-responsive" src="http://placehold.it/900x300" alt="">
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.</p>
        <a class="btn btn-primary" href="/post">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

        <hr>

        <!-- Second Blog Post -->
        <h2>
            <a href="/post">Kenali Penyakit Memory Sejak Dini</a>
        </h2>
        <p class="lead">
            by <a href="index.php">Dr. Budiman</a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:45 PM</p>
        <hr>
        <img class="img-responsive" src="http://placehold.it/900x300" alt="">
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, quasi, fugiat, asperiores harum voluptatum tenetur a possimus nesciunt quod accusamus saepe tempora ipsam distinctio minima dolorum perferendis labore impedit voluptates!</p>
        <a class="btn btn-primary" href="/post">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

        <hr>

        <!-- Pager -->
        <ul class="pager">
            <li class="previous">
                <a href="#">&larr; Older</a>
            </li>
            <li class="next">
                <a href="#">Newer &rarr;</a>
            </li>
        </ul>

    </div>
@endsection
