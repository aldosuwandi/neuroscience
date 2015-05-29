@extends('admin')

@section('content')
    <h3>Category List <br/><small>@if($clinic){{$clinic->name}}@endif</small></h3>
    <hr/>
    <div class="row">
        <div class="col-md-2">
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                        data-toggle="dropdown" aria-expanded="true">
                    Clinic
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    @foreach($clinics as $clinic)
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1" href="{{url('/admin/category/list/'.$clinic->id)}}">
                                {{$clinic->name}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <hr/>
    <a class="btn btn-primary" href="{{url('/admin/category/create')}}">Create</a>
    <hr/>
    <div class="row">
        <div class="table-responsive">
        @if (!empty($categories))
            <table class="table table-striped table-hover table-condensed table-bordered"
                   style="font-size:14px" width="50%">
                <thead>
                <tr>
                    <th class="col-sm-3">Name</th>
                    <th class="col-sm-2">Total Posts</th>
                    <th>Date Created</th>
                    <th class="col-sm-2">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            <a href="{{url('/admin/category/create/'.$category->id)}}">{{$category->name}}</a>
                        </td>
                        <td>{!!count($category->posts)!!}</td>
                        <td>{{$category->created_at}}</td>
                        <td>
                            <a class="btn btn-sm btn-danger" href="{{url('/admin/category/create/'.$category->id)}}">Edit</a>
                            <a class="btn btn-sm btn-success" href="{{url('/admin/category/delete/'.$category->id)}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
        </div>
    </div>
@stop