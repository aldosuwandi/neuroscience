@extends('blog')

@section('entries')
    <div class="col-md-8">

        <div>
            <h1 class="page-header">
                Memory Clinic -  Q&A
                <a class="btn btn-info" href="/createquestion" style="float:right">Ask The Doctor
                </a>
            </h1>

        </div>


        <!-- First Blog Post -->
        <h4>
            <a href="/answer">Berapa biaya pengobatan untuk tindakan X ?</a>
        </h4>
        <p>
            by <a href="index.php">Tono Supriyono</a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:00 PM</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.</p>
        <a class="btn btn-success btn-sm" href="/answer">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

        <hr>

        <!-- Second Blog Post -->
        <h4>
            <a href="/answer">Apa yang harus saya lakukan bila merasakan X ?</a>
        </h4>
        <p>
            by <a href="index.php">Tono Supriyono</a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:00 PM</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.</p>
        <a class="btn btn-success btn-sm" href="/answer">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

        <hr>

        <!-- Third Blog Post -->
        <h4>
            <a href="/answer">Mengapa diperlukan meminum obat X ?</a>
        </h4>
        <p>
            by <a href="index.php">Tono Supriyono</a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:00 PM</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.</p>
        <a class="btn btn-success btn-sm" href="/answer">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

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
