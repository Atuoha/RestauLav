@extends('layouts.admin_layouts.template')
@section('page_name', 'Edit Reservation')
@include('includes.tinymce')

@section('content')
    

<section class="panel">
<header class="panel-heading no-border">
Edit Reservation | {{ $reservation->table_number }}
</header>
    <div class="container">
      {!! Form::model($reservation, ['method'=>'PATCH', 'action'=>['AdminReservationController@update', $reservation->id] ]) !!}
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
                        {!! Form::label('date', 'Date of Reservation', ['class'=>'control-label']) !!}
                        {!! Form::text('date', null, ['class'=>'form-control dates','id'=>'datepicker2']) !!}                     
                       										
                    @error('date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>	
                
                <div class="form-group bootstrap-timepicker timepicker">
                        {!! Form::label('time', 'Time of Reservation', ['class'=>'control-label']) !!}
                        {!! Form::text('time', null, ['class'=>'form-control','id'=>'timepicker1','data-provide'=>'timepicker']) !!}                     
                        
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
                {!! Form::submit('Save Changes', ['class'=>'btn btn-success']) !!}
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