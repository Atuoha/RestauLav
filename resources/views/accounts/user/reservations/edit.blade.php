@extends('layouts.user_layouts.template')
@section('page_name', 'Edit Reservation')
@include('includes.tinymce')

@section('content')
    

<section class="panel">
<header class="panel-heading no-border">
Edit Reservation | {{ $reservation->table_number }}
</header>
    <div class="container">
      {!! Form::model($reservation_id ['method'=>'PATCH', 'action'=>['UserReservationController@update', reservation_id] ]) !!}
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
                    {!! Form::select('table_number', ['2'=>'Table For 2', '4'=>'Table for 4', '6'=>'Table for 6', '8'=>'Table for 8', '10'=>'Table for 10', '12'=>'Table for 12'], null, ['class'=>'form-control', 'placeholder'=>'Select Table Size']) !!}

                    @error('table_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group dates-wrap">
                        <label class="control-label">Date Of Reservation</label>
                        <input id="datepicker2" class="dates form-control"  placeholder="Date" type="text" name="date">                        
                       										
                    @error('date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>	
                
                <div class="form-group bootstrap-timepicker timepicker">
                    <label class="control-label">Time Of Reservation</label>
                        <input class="form-control" id="timepicker1" data-provide="timepicker" type="text" name="time" placeholder="Time"  name="time">
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