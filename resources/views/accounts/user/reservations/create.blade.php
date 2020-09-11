@extends('layouts.user_layouts.template')
@section('page_name', 'Create Reservations')
@include('includes.tinymce')

@section('content')
    

<section class="panel">
<header class="panel-heading no-border">
Create Reservations
</header>
    <div class="container">
      {!! Form::open(['method'=>'POST', 'action'=>'UserReservationController@store']) !!}
        <div class="row">
            <div class="col-sm-6">
                
                <div class="form-group">
                    {!! Form::label('contact', 'Contact Number', ['class'=>'control-label']) !!}
                    {!! Form::text('contact', null, ['class'=>'form-control']) !!}

                    @error('contact')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('table_number', 'Table Number', ['class'=>'control-label']) !!}
                    {!! Form::select('table_number', ['Table for 2'=>'Table For 2', 'Table for 4'=>'Table for 4', 'Table for 6'=>'Table for 6', 'Table for 8'=>'Table for 8', 'Table for 10'=>'Table for 10', 'Table for 12'=>'Table for 12'], null, ['class'=>'form-control', 'placeholder'=>'Select Table Size']) !!}

                    @error('table_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group dates-wrap">
                        <label class="control-label">Date Of Reservation</label>
                        <label class="control-label">Date Of Reservation</label>
                        {!! Form::text('date', null, ['class'=>'form-control dates','id'=>'datepicker2']) !!}                     
                       										
                    @error('date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>	
                
                <div class="form-group bootstrap-timepicker timepicker">
                    <label class="control-label">Time Of Reservation</label>
                        {!! Form::text('time', null, ['class'=>'form-control','id'=>'timepicker1','data-provide'=>'timepicker']) !!}                     
                        <div class="input-group-prepend">
                            <span  class="input-group-addon input-group-text"><span class="fa fa-clock-o"></span></span>
                        </div>

                    @error('date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>
        </div>

            <div class="container">
        <div class="row">
            <div class="form-group">
                {!! Form::label('message', 'Message', ['class'=>'control-label']) !!}
                {!! Form::textarea('message',null, ['class'=>'form-control','rows'=>3]) !!}

             @error('message')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
                {!! Form::submit('Create Reservation', ['class'=>'btn btn-success']) !!}
            </div>
        </div>

        </div>
      {!! Form::close() !!}  
</section>


<!-- Activators -->
<script>
    $(document).ready(function(){
        $( "#datepicker2" ).datepicker();
        $('#timepicker1').timepicker();

    })
</script>
@endsection