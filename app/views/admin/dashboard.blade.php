@extends('admin.layouts.home')

{{-- Content --}}
@section('content')
<div class="jumbotron">
    <div class="container">
        <h1>Administrator Dashboard</h1>
    </div>
</div>
    
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <h2>Blog</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>        
            <p><a href="{{{ URL::to('admin/blogs') }}}" class="btn btn-primary btn-lg" role="button">Manage &raquo;</a></p>
        </div>
        <div class="col-md-3">
            <h2>Pages</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>        
            <p><a href="{{{ URL::to('admin/pages') }}}" class="btn btn-primary btn-lg" role="button">Manage &raquo;</a></p>
        </div>
        <div class="col-md-3">
            <h2>Users</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>        
            <p><a href="{{{ URL::to('admin/users') }}}" class="btn btn-primary btn-lg" role="button">Manage &raquo;</a></p>
        </div>
        <div class="col-md-3">
            <h2>Roles</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>                
            <p><a href="{{{ URL::to('admin/roles') }}}" class="btn btn-primary btn-lg" role="button">Manage &raquo;</a></p>      
        </div>
    </div>
</div>
@stop
