@extends('layouts.admin_layouts.template')
@include('includes.tinymce')
@section('page_name', 'Edit Dish')

@section('content')
    

<section class="panel">
<header class="panel-heading no-border">
Edit Dish | {{ $dish->name }} by {{ $dish->user->name }}
</header>
<div class="container">
{!! Form::model($dish, ['method'=>'PATCH', 'action'=>-['DishController@store', $dish->id], 'files'=>true]) !!}

    <div class="row">
        <div class="col-sm-6">

            <div class="form-group">
              {!! Form::label('name', 'Name', ['class'=>'control-label']) !!}
              {!! Form::text('name', null, ['class'=>'form-control'])!!}

              @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            
            <div class="form-group">
              {!! Form::label('user_id', 'Cook', ['class'=>'control-label']) !!}
              {!! Form::select('user_id', [''=>'Select Cook'] + $users, 0, ['class'=>'form-control'])!!}

              @error('user_id')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              {!! Form::label('price', 'Price', ['class'=>'control-label']) !!}
              {!! Form::number('price', null, ['class'=>'form-control'])!!}

              @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

        </div>


        <div class="col-sm-6">
             <div class="form-group">
              {!! Form::label('food_plan', 'Food Plan', ['class'=>'control-label']) !!}
              {!! Form::select('food_plan',['basic'=>'Basic', 'special'=>'Special'], null, ['class'=>'form-control','placeholder' => 'Select PLan'])!!}
           
              @error('food_plan')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            
            <div class="form-group">
              {!! Form::label('category_id', 'Category', ['class'=>'control-label']) !!}
              {!! Form::select('category_id', ['' => 'Select Category'] + $categories, null, ['class'=>'form-control'])!!}

              @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              {!! Form::label('photo_id', 'Imagery', ['class'=>'control-label']) !!}
              {!! Form::file('photo_id', ['class'=>'form-control', 'accept'=>'image*/'])!!}

              @error('photo_id')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="form-group">
                {!! Form::label('content', 'Content', ['class'=>'control-label']) !!}
                {!! Form::textarea('content',null, ['class'=>'form-control','rows'=>3]) !!}

             @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
                {!! Form::submit('Create Dish', ['class'=>'btn btn-success']) !!}
            </div>
        </div>
    </div>

{!! Form::close() !!}
</div>
@stop