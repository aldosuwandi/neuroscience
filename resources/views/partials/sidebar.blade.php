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
            <ul id="category_tree">
                @foreach($categories as $category)
                    <li value="{{$category->id}}">
                        <a href="/clinic/home/{{$clinic->id}}/{{$clinic->slug}}/{{$category->slug}}">{{$category->name}}</a>
                        <span class="badge pull-right">{!! count($category->posts()->getResults()); !!}</span>
                    <ul>
                        @foreach($category->posts()->getResults() as $post)
                            <li>
                                <a href="/post/view/{{$post->id}}/{{$post->slug}}">{{$post->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                    </li>
                @endforeach
                <li>
                    <i class="indicator glyphicon glyphicon-question-sign"></i>
                    <a href="/question/list/{{$clinic->id}}/{{$clinic->slug}}">Tanya Jawab</a>
                </li>
            </ul>
        </div>
    </div>
</div>