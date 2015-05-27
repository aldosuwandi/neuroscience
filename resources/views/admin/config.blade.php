@extends('admin')

@section('content')
    <h4> Version 0.5-Beta </h4>
    <a class="btn  btn-success" href="/admin/config/update">Update</a>
    <hr/>

    <h4>Dump Database </h4>
    <a class="btn  btn-danger" href="/admin/config/database/dump">Dump</a>
    <hr/>

    <h4>Import Database </h4>
    {!!Form::open([
        'url'=>'/admin/config/database/import',
        'method'=>'POST',
        'files'=> true
    ])!!}
    <div class="control-group form-group">
        <div class="controls">
            {!!Form::file('sql_file') !!}
        </div>
        <br/>
        <button class="btn btn-info" type="submit">Import</button>
    </div>
    {!!Form::close()!!}
    <hr/>

    <h4> Cache </h4>
    <a class="btn  btn-success" href="/admin/config/cache/clear">Clear App Cache</a>
    <a class="btn  btn-success" href="/admin/config/cache/route">Cache Route</a>
    <a class="btn  btn-success" href="/admin/config/cache/config">Cache Config</a>
    <hr/>
@stop