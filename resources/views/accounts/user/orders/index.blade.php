@extends('layouts.user_layouts.template')
@section('page_name', 'All Orders')

@section('content')
<section class="panel">
<header class="panel-heading no-border">
Orders | You can only change your choice if the item has not yet been delivered
</header>

@if(session('ORDER_CREATE'))
    <div class="alert alert-success">{{ session('ORDER_CREATE') }}</div>
@endif

@if(session('ORDER_DELETE'))
    <div class="alert alert-success">{{ session('ORDER_DELETE') }}</div>
@endif

@if(session('ORDER_UPDATE'))
    <div class="alert alert-success">{{ session('ORDER_UPDATE') }}</div>
@endif

@if(session('ORDER_RETRIEVE'))
    <div class="alert alert-success">{{ session('ORDER_RETRIEVE') }}</div>
@endif

<form action="/delete/orders" method="post">
 {{ csrf_field() }}   
 {{ method_field('delete') }}

<button  id="multi-del-btn" type="submit" class="btn btn-danger">Delete Records</button>    

<!-- Hiding multi-del-btn -->
    <style>
        #multi-del-btn{
            display:none;
        }
    </style>
<!--  -->


<table class="table table-bordered table-responsive">
    <thead>
        <tr>
        <th><input type="checkbox" name="checkbox_single" id="checkbox"></th>
            <th>#</th>
            <th>Name Used</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Address</th>
            <th>Item</th>
            <th>Quant</th>
            <th>Price</th>
            <th>Total Price</th>
            <th>Time</th>
            <th>Date</th>
            <th>Message</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if(count($orders) > 0)
            @foreach($orders as $order)
                <tr>
                <td><input type="checkbox" value="{{ $order->id }} " name="checkbox_array[]" class="checkboxes"></td>
 </form>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->user->email }}</td>
                    <td>{{ $order->contact }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->item }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>${{ $order->price }}</td>
                    <td>${{ $order->total_price }}</td>
                    <td>{{ $order->time }}</td>
                    <td>{{ $order->date }}</td>
                    <td>{{ $order->message }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->created_at->diffForHumans() }}</td>
                    <td>{{ $order->created_at->diffForHumans() }}</td>
                    <td>
                        <div class="btn-group">
                            @if($order->status != 'Delivered')
                            <a class="btn btn-success mb-2" href="{{ route('user_orders.edit', $order->id) }}">Edit</a>
                            @endif
                            
                            <a class="btn btn-warning" href="{{ route('user_orders.show', $order->id) }}">View</a>

                            {!! Form::open(['method'=>'DELETE', 'action'=>['UserOrdersController@destroy', $order->id] ]) !!}
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}

                         </div>
                    </td>
               
                </tr>
            @endforeach
        @else
        <div class="alert alert-danger">
            NO ORDERS YET! WHY NOT MAKE ONE. 
            <a class="btn btn-success" href="{{ route('user_orders.create') }}"> - Make an order</a>

        </div>
        @endif
    </tbody>
</table>

    <div class="col-sm-6">
        <div class="col-sm-6 col-off-sm-5">
            {{ $orders->render() }}
        </div>
    </div>

</section>




<!-- Script for multi-selection -->
<script>
       $(document).ready(function(){

        //  MULTI-SELECTION
           $('#checkbox').click(function(){
             if(this.checked){
                 $('#multi-del-btn').fadeIn('slow');
                 $('.checkboxes').each(function(){
                     this.checked = true;
                 })
             }else{
                $('#multi-del-btn').fadeOut('slow');
                $('.checkboxes').each(function(){
                     this.checked = false;
                 })
             }

           }); 

        // SINGLE SELECTION
           $('.checkboxes').click(function(){
               if(this.checked){
                 $('#multi-del-btn').fadeIn('slow');
               }else{
                $('#multi-del-btn').fadeOut('slow');
               }
           })
           
       });
   </script>
<!--  -->
@stop