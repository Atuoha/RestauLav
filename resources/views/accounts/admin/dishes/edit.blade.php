@extends('layouts.admin_layouts.template')
@include('includes.tinymce')
@section('page_name', 'Edit Dish')

@section('content')
    

<section class="panel">
<header class="panel-heading no-border">
Edit Dish | {{ $dish->name }} by {{ $dish->user->name }}
</header>
<div class="container">
{!! Form::model($dish, ['method'=>'PATCH', 'action'=>['DishController@store', $dish->id], 'files'=>true]) !!}

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
              {!! Form::select('user_id', [''=>'Select Cook'] + $users, null, ['class'=>'form-control'])!!}

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
              {!! Form::file('photo_id', ['class'=>'form-control', 'accept'=>'image/*', 'id'=>'inpFile'])!!}

              @error('photo_id')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror

              <div class="image-preview pull-right" id="imagePreview">
                <img width="100" class="img-circle image-preview__image" src="{{ $dish->photo->name }}" alt=""> 
                <span class="image-preview__default-text"> </span>
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



<!-- SCRIPTING FOR PREVIEWING IMAGE BEFORE UPLOADING USING PHP -->
<script>

    const inpFile = document.getElementById('inpFile');
    const previewContainer = document.getElementById('imagePreview');
    const previewImage = document.querySelector('.image-preview__image');
    const previewDefault = document.querySelector('.image-preview__default-text');

    inpFile.addEventListener('change',function(){
        const file = this.files[0];

        if(file){
            const reader = new FileReader();
            previewDefault.style.display = 'none';
            previewImage.style.display = 'block';

            reader.addEventListener('load',function(){
                previewImage.setAttribute('src',this.result);
                previewImage.style.width = '130px';
            });
            reader.readAsDataURL(file)
        }else{
            previewDefault.style.display = 'block';
            previewImage.style.display = 'none';
            previewImage.setAttribute('src',"");
        }
    })
</script>
@stop