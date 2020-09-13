@extends('layouts.user_layouts.template')
@section('page_name', 'Make Order')
@include('includes.tinymce')

@section('content')
    

<section class="panel">
<header class="panel-heading no-border">
Make Order for an item  | We accept Payby-Deleivery Policy
</header>
    <div class="container">
      {!! Form::open(['method'=>'POST', 'action'=>'UserReservationController@store']) !!}
        <div class="row">
            <div class="col-sm-6">
                
                <div class="form-group">
                    {!! Form::label('contact', 'Contact Number', ['class'=>'control-label']) !!}
                    {!! Form::text('contact', null, ['class'=>'form-control','placeholder'=>'Enter Contact Number']) !!}

                    @error('contact')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('address', 'Address', ['class'=>'control-label']) !!}
                    {!! Form::text('address', null, ['class'=>'form-control','placeholder'=>'Enter Address']) !!}

                    @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('item', 'Item', ['class'=>'control-label']) !!}
                    {!! Form::select('item', [''=>'Select Item'] + $items, null, ['class'=>'form-control']) !!}

                    @error('item')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('quantity', 'Quantity', ['class'=>'control-label']) !!}
                    {!! Form::number('quantity', null, ['class'=>'form-control','placeholder'=>'Enter Quantity']) !!}

                    @error('quantity')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('total_price', 'Total Price', ['class'=>'control-label']) !!}
                    {!! Form::number('total_price', null, ['class'=>'form-control','placeholder'=>'Total Price','read-only']) !!}

                    @error('total_price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="col-sm-6">
                <div class="form-group dates-wrap">
                        <label class="control-label">Date Of Reservation</label>
                        {!! Form::text('date', null, ['class'=>'form-control dates','id'=>'datepicker2']) !!}                     
                       										
                    @error('date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>	
                
                <div class="form-group bootstrap-timepicker timepicker">
                    <label class="control-label">Time Of Reservation</label>
                        {!! Form::text('time', null, ['class'=>'form-control','id'=>'timepicker1','data-provide'=>'timepicker']) !!}                     
                       

                    @error('date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                
                <div class="form-group">
                    {!! Form::label('message', 'Message', ['class'=>'control-label']) !!}
                    {!! Form::textarea('message',null, ['class'=>'form-control','rows'=>3]) !!}

                    @error('message')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>
        </div>

        <div class="container">
            <div class="row">
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