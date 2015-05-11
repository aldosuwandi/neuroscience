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
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Categories</h4>
        <div class="row">
            <ul id="tree1">
                @foreach($categories as $category)
                    <li><a href="/clinic/home/{{$clinic->id}}/{{$category->id}}">{{$category->name}}</a>
                        <span class="badge pull-right">{!! count($category->posts()->getResults()); !!}</span>
                    <ul>
                        @foreach($category->posts()->getResults() as $post)
                            <li>
                                <a href="/post/view/{{$post->id}}">{{$post->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>