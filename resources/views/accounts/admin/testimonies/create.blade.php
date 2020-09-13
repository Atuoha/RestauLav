@extends('layouts.admin_layouts.template')
@section('page_name', 'Create Testimony')
@include('includes.tinymce')

@section('content')
<section class="panel">
<header class="panel-heading no-border">
Message Testimony 
</header>

<div class="container">
 {!! Form::open(['method'=>'POST', 'action'=>'AdminTestimonyController@store']) !!} 
    <div class="row">
       <div class="col-sm-6">
            <div class="form group">
                {!! Form::label('message', 'Message', ['class'=>'control-label']) !!}
                {!! Form::textarea('message', null, ['class'=>'form-control','rows'=>3]) !!}
            </div>

            @error('message')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
       </div> 

       <div class="col-sm-6">
            <div class="form group">
                {!! Form::label('job_title', 'Job Title', ['class'=>'control-label']) !!}
                {!! Form::text('job_title', null, ['class'=>'form-control','placeholder'=>'Enter Job Title']) !!}
            </div>

            @error('job_title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
       </div>         
    </div>

    <div class="row container pull-right">
           <div class="form-group">
               {!! Form::submit('Create Testimony', ['class'=>'btn btn-success']) !!}
           </div>
       </div>
{!! Form::close() !!}    
</div>
</section>
@stop