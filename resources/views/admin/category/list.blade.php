@extends('admin')

@section('content')
    <h3>Category List</h3>
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
                            <a role="menuitem" tabindex="-1" href="/admin/category/list/{{$clinic->id}}">
                                {{$clinic->name}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <hr/>
    <a class="btn btn-primary" href="/admin/category/create">Create</a>
    <hr/>
    <div class="row">
        <div class="col-md-5">
            <div class="table-responsive">
            @if (!empty($categories))
                <table class="table table-striped table-hover table-condensed table-bordered"
                       style="font-size:14px" width="50%">
                    <thead>
                    <tr>
                        <th class="col-sm-3">Name</th>
                        <th class="col-sm-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td>
                                <a class="btn btn-sm btn-danger">Edit</a>
                                <a class="btn btn-sm btn-success">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
            </div>
        </div>
    </div>
@stop