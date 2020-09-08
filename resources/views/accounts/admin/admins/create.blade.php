@extends('layouts.admin_layouts.template')
@section('page_name', 'Add Users')

@section('content')
    

<section class="panel b-4">
<header class="panel-heading no-border">
Add Users
</header>
   
{!! Form::open(['method'=>'Post', 'action'=>'AdminUserController@store', 'file'=>true]) !!}

<div class="container">
<div class="row">
    <div class="col-sm-6">

        <div class="Form-group">
           {!! Form::label('fullname', 'Fullname', ['class'=>'control-label']) !!}
           {!! Form::text('fullname',null,['class'=>'form-control','placeholder'=>'Enter Fullname'])!!}

           @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
           @enderror
        </div>

        <div class="Form-group">
           {!! Form::label('email', 'Email', ['class'=>'control-label']) !!}
           {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Enter Email'])!!}

           @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
           @enderror
        </div>

        <div class="Form-group">
           {!! Form::label('password', 'Password', ['class'=>'control-label']) !!}
           {!! Form::password('password',['class'=>'form-control','placeholder'=>'Enter Password'])!!}

           @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
           @enderror
        </div>

    </div>

    <div class="col-sm-6">

         <div class="Form-group">
            {!! Form::label('status', 'Status', ['class'=>'control-label']) !!}
            {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], 0 , ['class'=> 'form-control', 'placeholder' => 'Select status...'])!!}

            @error('status')
            <div class="alert alert-danger">{{ $message }}</div>
           @enderror
        </div>
        
        <div class="Form-group">
            {!! Form::label('role_id', 'Role', ['class'=>'control-label']) !!}
            {!! Form::select('role_id', ['' => 'Select Role'] + $role, 2, ['class'=> 'form-control'])!!}

            @error('role_id')
            <div class="alert alert-danger">{{ $message }}</div>
           @enderror
        </div>

        <div class="Form-group">
            {!! Form::label('photo_id', 'Picture', ['class'=>'control-label']) !!}
            {!! Form::file('photo_id',['class'=> 'form-control', 'accept'=>'image*/'])!!}
            @error('photo_id')
            <div class="alert alert-danger">{{ $message }}</div>
           @enderror
        </div>

    </div>
</div>

    <br>
    <div class="Form-group col-sm-3 pull-right">
        {!! Form::submit('Create User', ['class'=>'btn btn-primary btn-block']) !!}
    </div>
    <br>
  
   
</div> 

{!! Form::close() !!}  



</section>
@endsection