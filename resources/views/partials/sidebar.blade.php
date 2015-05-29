<div class="col-md-4">

    @yield('topSidebar')

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Search</h4>
        @if (strpos(Request::url(),'question') !== false)
            {!!Form::open([
                'url'=>'/question/search',
                'method'=>'GET'
            ])!!}
        @else
            {!!Form::open([
                'url'=>'/post/search',
                'method'=>'GET'
            ])!!}
        @endif
        {!!Form::hidden('id',$clinic->id,[])!!}
        <div class="input-group">
            @if (isset($text))
                {!!Form::text('text',$text,[
                    'class' => 'form-control',
                    'id'=>'text',
                ])!!}
            @else
                {!!Form::text('text',null,[
                    'class' => 'form-control',
                    'id'=>'text',
                ])!!}
            @endif
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
        {!!Form::close();!!}
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Categories
            <small>
                (<a href="{{url('/clinic/home/'.$clinic->id.'/'.$clinic->slug)}}">{{$clinic->name}}
                </a>)
            </small>

        </h4>
        <div class="row">
            <ul id="category_tree">
                @foreach($categories as $category)
                    <li value="{{$category->id}}">
                        <a href="{{url('/clinic/home/'.$clinic->id.'/'.$clinic->slug.'/'.$category->slug)}}">{{$category->name}}</a>
                        <?php $postList = $category->getPosts(); ?>
                        <span class="badge pull-right">{!! count($postList); !!}</span>
                    <ul>
                        @foreach($postList as $post)
                            <li>
                                <a href="{{url('/post/view/'.$post->id.'/'.$post->slug)}}">{{$post->title}}"</a>
                            </li>
                        @endforeach
                    </ul>
                    </li>
                @endforeach
                <li>
                    <i class="indicator glyphicon glyphicon-question-sign"></i>
                    <a href="{{url('/question/list/'.$clinic->id.'/'.$clinic->slug)}}">Tanya Jawab</a>
                </li>
            </ul>
        </div>
    </div>

    @if(count ($clinic->ads))
            @foreach($clinic->ads as $ad)
                <a href="{{$ad->link}}">
                    <img src="{{url('/uploads/'.$ad->img_url)}}" class="img-responsive" alt="{{$ad->name}}"/>
                </a>
                <br/>
            @endforeach
    @endif
</div>