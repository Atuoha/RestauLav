@extends('layouts.admin_layouts.template')
@section('page_name', 'Add Users')

@section('content')
    

<section class="panel">
<header class="panel-heading no-border">
Add Users
</header>
   
{!! form::open(['method'=>'Post', 'action'=>'AdminUserController@store', 'file'=>true]) !!}

<div class="row">
    <div class="col-md-6 col-lg-12">

        <div class="form-group">
           {!! form::label('username', 'Username', ['class'=>'control-label']) !!}
           {!! form::text('username',null,['class'=>'form-control','placeholder'=>'Enter Username'])!!}
        </div>

        <div class="form-group">
           {!! form::label('fullname', 'Fullname', ['class'=>'control-label']) !!}
           {!! form::text('fullname',null,['class'=>'form-control','placeholder'=>'Enter Fullname'])!!}
        </div>

        <div class="form-group">
           {!! form::label('email', 'Email', ['class'=>'control-label']) !!}
           {!! form::text('email',null,['class'=>'form-control','placeholder'=>'Enter Email'])!!}
        </div>

    </div>

    <div class="col-md-6 col-lg-12">
        
        <div class="form-group">
            {!! form::label('status', 'Status', ['class'=>'control-label']) !!}
            {!! form::select() !!}
        </div>



    </div>
</div>
  