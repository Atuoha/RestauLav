@extends('layouts.admin_layouts.template')
@section('page_name', 'Edit Category')

@section('content')
    

<section class="panel b-4">
<header class="panel-heading no-border">
Edit Category | {{ $category->name }}
</header>
   
{!! Form::model($category, ['method'=>'PATCH', 'action'=>['CategoryController@update', $category->id] ]) !!}

<div class="container">
<div class="row">
    <div class="col-sm-6">

        <div class="Form-group">
           {!! Form::label('name', 'Category Name', ['class'=>'control-label']) !!}
           {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter Category Name'])!!}

           @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
           @enderror
        </div>

        
    <br>
    <div class="Form-group col-sm-3">
        {!! Form::submit('Save Edit', ['class'=>'btn btn-primary btn-block']) !!}
    </div>
    <br>
  
   
</div> 

{!! Form::close() !!}  



</section>
@endsection