@extends('admin')

@section('content')
    <h3>Ads List <br/><small>@if($clinic){{$clinic->name}}@endif</small></h3>
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
                            <a role="menuitem" tabindex="-1" href="{{url('/admin/ads/list/'.$clinic->id)}}">
                                {{$clinic->name}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <hr/>
    <a class="btn btn-primary" href="{{url('/admin/ads/create')}}">Create</a>
    <hr/>
    <div class="row">
        <div class="table-responsive">
        @if (!empty($ads))
            <table class="table table-striped table-hover table-condensed table-bordered"
                   style="font-size:14px" width="50%">
                <thead>
                <tr>
                    <th class="col-sm-3">Name</th>
                    <th class="col-sm-3">Link</th>
                    <th>Date Created</th>
                    <th class="col-sm-2">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ads as $ad)
                    <tr>
                        <td>
                            <a href="{{url('/admin/ads/create/'.$ad->id)}}">{{$ad->name}}</a>
                        </td>
                        <td>{{$ad->link}}</td>
                        <td>{{$ad->created_at}}</td>
                        <td>
                            <a class="btn btn-sm btn-danger" href="{{url('/admin/ads/create/'.$ad->id)}}">Edit</a>
                            <a class="btn btn-sm btn-success" href="{{url('/admin/ads/delete/'.$ad->id)}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
        </div>
    </div>
@stop