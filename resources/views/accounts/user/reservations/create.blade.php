@extends('layouts.user_layouts.template')
@section('page_name', 'Create Reservations')
@include('includes.tinymce')

@section('content')
    

<section class="panel">
<header class="panel-heading no-border">
Create Reservations
</header>
    <div class="container">
      {!! From::open(['method'=>'POST', 'action'=>'UserReservationController@store']) !!}
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
                    {!! Form::select('table_number', ['2'=>'Table For 2', '4'=>'Table for 4', '6'=>'Table for 6', '8'=>'Table for 8'], null, ['class'=>'form-control', 'placeholder'=>'Select Table Size']) !!}

                    @error('table_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <div class="input-group dates-wrap">                                              
                        <input id="datepicker2" required class="dates form-control"  placeholder="Date" type="text" name="date">                        
                        <div class="input-group-prepend">
                            <span  class="input-group-text"><span class="fa fa-calendar"></span></span>
                        </div>											
                    </div>

                    @error('date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>	
                
                <div class="form-group">
                    <div class="input-group bootstrap-timepicker timepicker input-small">
                        <input class="form-control" id="timepicker1" data-provide="timepicker" required type="text" name="time" placeholder="Time"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Time'" name="time">
                        <div class="input-group-prepend">
                            <span  class="input-group-addon input-group-text"><span class="fa fa-clock-o"></span></span>
                        </div>
                    </div>	

                    @error('date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>
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
    </div>
</section>


<!-- Activators -->
<script>
    $(document).ready(function(){
        $( function() {
            $( "#datepicker" ).datepicker();
            $( "#datepicker2" ).datepicker();
            $('#timepicker1').timepicker();
        });


    })
</script>
@endsection