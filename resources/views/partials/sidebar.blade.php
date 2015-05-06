<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Search</h4>
        <div class="input-group">
            <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
        </div>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    @foreach($categories as $category)
                        <li>
                            <a href="/clinic/home/{{$clinic->id}}/{{$category->id}}">{{$category->name}}</a>
                        </li>
                    @endforeach
                    <li>
                        <a href="/question/list/{{$clinic->id}}">Question - Answer</a>
                    </li>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>


</div>
