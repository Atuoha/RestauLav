@extends('layouts.user_layouts.template')
@section('page_name', 'Edit Profile')

@section('content')
    
@if(session('USER_UPDATE'))
    <div class="alert alert-success">{{ session('USER_UPDATE') }}</div>
@endif

<section class="panel b-4">
<header class="panel-heading no-border">
Edit Profile | {{ $user->name }}
</header>
   
{!! Form::model($user, ['method'=>'PATCH', 'action'=>['UserProfileController@update', $user->id], 'files'=>true]) !!}

<div class="container">
<div class="row">
    <div class="col-sm-6">

        <div class="Form-group">
           {!! Form::label('name', 'Fullname', ['class'=>'control-label']) !!}
           {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter Fullname'])!!}

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

          
        </div>

    </div>

    <div class="col-sm-6">

         <div class="Form-group">
            {!! Form::label('status', 'Status', ['class'=>'control-label']) !!}
            {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], null , ['class'=> 'form-control', 'placeholder' => 'Select status...'])!!}

            @error('status')
            <div class="alert alert-danger">{{ $message }}</div>
           @enderror
        </div>
        
       

        <div class="row">
            <div class="col-sm-6">
                <div class="Form-group ">
                    {!! Form::label('photo_id', 'Picture', ['class'=>'control-label']) !!}
                    {!! Form::file('photo_id',['class'=> 'form-control', 'accept'=>'image/*', 'id'=>'inpFile'])!!}

                    @error('photo_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6"> 
                    <div class="image-preview" id="imagePreview">
                        <img width="100" class="img-circle image-preview__image" src="{{ $user->photo == '' ? '/images/default.png' : $user->photo->name   }}" alt=""> 
                        <span class="image-preview__default-text"> </span>
                    </div>
            </div>
        </div>
       
        

    </div>
</div>

    <br>
    <div class="Form-group col-sm-3 pull-right">
        {!! Form::submit('Save Edit', ['class'=>'btn btn-primary btn-block']) !!}
    </div>
    <br>
  
   
</div> 

{!! Form::close() !!}  
</section>




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



@endsection