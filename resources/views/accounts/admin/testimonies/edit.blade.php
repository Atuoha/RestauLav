@extends('layouts.admin_layouts.template')
@section('page_name', 'Edit Testimony')
@include('includes.tinymce')

@section('content')



<section class="panel">
<header class="panel-heading no-border">
Message Testimony 
</header>

<div class="container">
 {!! Form::model($testimony, ['method'=>'PATCH', 'action'=>['AdminTestimonyController@update', $testimony->id] ]) !!} 
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
                {!! Form::label('job_title', 'Job_Title', ['class'=>'control-label']) !!}
                {!! Form::text('job_title', null, ['class'=>'form-control','placeholder'=>'Enter Job_Title']) !!}
            </div>

            @error('job_title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
       </div>         
    </div>

    <div class="row container pull-right">
           <div class="form-group">
               {!! Form::submit('Edit Testimony', ['class'=>'btn btn-warning']) !!}
           </div>
       </div>
{!! Form::close() !!}    
</div>
</section>
@stop