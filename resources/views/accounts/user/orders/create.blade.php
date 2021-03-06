@extends('layouts.user_layouts.template')
@section('page_name', 'Make Order')
@include('includes.tinymce')


@section('content')
    

<section class="panel">
<header class="panel-heading no-border">
Make Order(This version supports just a single item) | We don't accept Payby-Delivery Policy | Payment is through PayPal
</header>
<div class="container">
      {!! Form::open(['method'=>'POST', 'action'=>'PayPalController@payment']) !!}
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

                <select class="form-control" id="item" name="item">
                    <option >Select  Item</option>
                    @foreach($items as $item)
                    <option id="{{$item->price}}" class="opt-item"  value="{{$item->name}}">{{$item->name}}</option>
                    @endforeach

                    
                    @error('item')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </select>


                    @error('item')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <p id="sing_price"></p>

                <div class="form-group">
                    {!! Form::label('quantity', 'Quantity', ['class'=>'control-label']) !!}
                    {!! Form::number('quantity', null, ['class'=>'form-control','placeholder'=>'Enter Quantity']) !!}

                    @error('quantity')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('total_price', 'Total Price', ['class'=>'control-label']) !!}
                    {!! Form::number('display_total', null, ['class'=>'total_price form-control','placeholder'=>'Total Price','disabled']) !!}

                    <!-- These  fields store price and total price -->
                    {!! Form::hidden('price',null, ['class'=>'price control-label']) !!}
                    {!! Form::hidden('total_price',null, ['class'=>'total_price control-label']) !!}
                    <!--  -->

                    @error('total_price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="col-sm-6">
                <div class="form-group dates-wrap">
                        {!! Form::label('date', 'Date of Delivery', ['class'=>'control-label']) !!}
                        {!! Form::text('date', null, ['class'=>'form-control dates','id'=>'datepicker2']) !!}                     
                       										
                    @error('date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>	
                
                <div class="form-group bootstrap-timepicker timepicker">
                         {!! Form::label('time', 'Time of Delivery', ['class'=>'control-label']) !!}
                        {!! Form::text('time', null, ['class'=>'form-control','id'=>'timepicker1','data-provide'=>'timepicker']) !!}                     
                       

                    @error('time')
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
                NB: Use <b>sb-mn8sy3193350@personal.example.com</b> as PayPal Email <br>
                and <b>l.(ON7A#</b> as Password so as to test it

            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="form-group">
                    {!! Form::submit('Make Order | Pay Through PayPal', ['class'=>'btn btn-success']) !!}
                  <img src="/images/cards.png" width="200" class="img-responsive img-rounded"  alt="">
                </div>
            </div>

        </div>
      {!! Form::close() !!}  
</section>



<script>
    $(document).ready(function(){
        // Activators 
        $( "#datepicker2" ).datepicker();
        $('#timepicker1').timepicker();


        // Pulling Total Price
        let price;
        let quantity;
        let total;
         $('#item').blur(function(){
             price =  $('.opt-item').attr('id');
             $('#sing_price').html(`Price: $${price}`)
             $('.price').attr('value',`${price}`);
             console.log(`Price: ${price}`)

             total = price * quantity
             $('.total_price').attr('value',`${total}.00`);
         }) 

         $('#quantity').keyup(function(e){
            quantity = e.target.value
             total = price * quantity
             console.log(`Quantity: ${quantity}`)
             console.log(`Total: ${total}`)

             $('.total_price').attr('value',`${total}.00`);
         })

         if(quantity != '' && price != ''){
            total = price * quantity
            $('.total_price').attr('value',`${total}.00`);
         }
    })
</script>
@endsection