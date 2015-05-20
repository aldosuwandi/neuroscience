@extends('admin')

@section('content')
    <h3>Post List <br/><small>@if($clinic){{$clinic->name}}@endif @if($category)| {{$category->name}}@endif</small></h3>
    <hr/>
    <div class="row">
        <div class="col-md-1">
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                        data-toggle="dropdown" aria-expanded="true">
                    Clinic
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    @foreach($clinics as $clinic)
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1" href="/admin/post/list/{{$clinic->id}}">
                                {{$clinic->name}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-1">
            @if (!empty($categories))
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                            data-toggle="dropdown" aria-expanded="true">
                        Category
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                        @foreach($categories as $category)
                            <li role="presentation">
                                <a role="menuitem" tabindex="-1" href="/admin/post/list/{{$clinicId}}/{{$category->id}}">
                                    {{$category->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <hr/>
    <a class="btn btn-primary" href="/admin/post/create?clinic=1">Create</a>
    <hr/>
    <div class="table-responsive">
        @if (!empty($posts))
        <table class="table table-striped table-hover table-condensed table-bordered" style="font-size: 14">
            <thead>
            <tr>
                <th class="col-sm-5">Title</th>
                <th class="col-sm-3">Author</th>
                <th class="col-sm-2">Created Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>
                        <a href="/admin/post/create/{{$post->id}}?clinic={{$post->category->clinic->id}}">{{$post->title}}
                        </a>
                    </td>
                    <td>{{$post->creator}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>
                        <a class="btn btn-sm btn-danger" href="/admin/post/create/{{$post->id}}?clinic={{$post->category->clinic->id}}">Edit</a>
                        <a class="btn btn-sm btn-success" href="/admin/post/delete/{{$post->id}}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div align="center">
            <?php echo $posts->render();?>
        </div>
        @endif
    </div>
@stop