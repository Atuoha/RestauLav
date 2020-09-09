@extends('layouts.admin_layouts.template')
@section('page_name', 'Edit User')

@section('content')
    

<section class="panel b-4">
<header class="panel-heading no-border">
Edit User | {{ $user->name }}
</header>
   
{!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUserController@update', $user->id], 'files'=>true]) !!}

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
        
        <div class="Form-group">
            {!! Form::label('role_id', 'Role', ['class'=>'control-label']) !!}
            {!! Form::select('role_id', ['' => 'Select Role'] + $role, null, ['class'=> 'form-control'])!!}

            @error('role_id')
            <div class="alert alert-danger">{{ $message }}</div>
           @enderror
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="Form-group ">
                    {!! Form::label('photo_id', 'Picture', ['class'=>'control-label']) !!}
                    {!! Form::file('photo_id',['class'=> 'form-control', 'accept'=>'image*/'])!!}

                    @error('photo_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6">
                <img width="100" class="img-circle" src="{{ $user->photo == '' ? '/images/default.png' : $user->photo->name   }}" alt="">              
            </div>
        </div>
       
         <!-- ADDITIONAL OPTIONAL FIELD TRIGGER -->
         <label class="checkbox">
                <input type="checkbox" id="checkbox" value="remember-me"> Are you registering a staff?
            </label>
        <!--  -->


        <!-- ADDITIONAL OPTIONAL FIELD -->
        <div class="Form-group" id="job_field">
           {!! Form::label('job_title', 'Job Title', ['class'=>'control-label']) !!}
           {!! Form::text('job_title',null,['class'=>'form-control','placeholder'=>'Enter Job Title'])!!}
        </div>
        <!--  -->

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



<!-- Tiny Css for hiding job_field -->
<style>
    #job_field{
        display:none;
    }
</style>
<!--  -->

<!-- Script for job_field -->
    <script>
        $('#checkbox').click(function(){
            if(this.checked == true){
                $('#job_field').fadeIn('slow');
            }else{
                $('#job_field').fadeOut('slow');
            }
        })
    </script>
<!--  -->
@endsection