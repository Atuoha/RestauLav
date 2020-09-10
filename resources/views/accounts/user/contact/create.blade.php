@extends('layouts.user_layouts.template')
@section('page_name', 'Create Contact')

@section('content')



<section class="panel">
<header class="panel-heading no-border">
Message Contact 
</header>

<div class="container">
 {!! Form::open(['method'=>'POST', 'action'=>'UserContactController@store']) !!} 
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
                {!! Form::label('subject', 'Subject', ['class'=>'control-label']) !!}
                {!! Form::text('subject', null, ['class'=>'form-control','placeholder'=>'Enter Subject']) !!}
            </div>

            @error('subject')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
       </div>         
    </div>

    <div class="row container pull-right">
           <div class="form-group">
               {!! Form::submit('Create Contact', ['class'=>'btn btn-success']) !!}
           </div>
       </div>
{!! Form::close() !!}    
</div>
</section>
@stop