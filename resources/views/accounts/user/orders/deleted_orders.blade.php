@extends('layouts.user_layouts.template')
@section('page_name', 'All Trashed Orders')

@section('content')
<section class="panel">
<header class="panel-heading no-border">
Orders | The Trash Bin
</header>


@if(session('ORDER_DELETE'))
    <div class="alert alert-success">{{ session('ORDER_DELETE') }}</div>
@endif




<form action="/action/orders" method="post">
 {{ csrf_field() }}   
 {{ method_field('put') }}

<select name="action" required class="form-control multi-action col-md-4" id="">
    <option value="" disabled selected>Select Option</option>
    <option value="terminate">Termainate</option>
    <option value="retrieve">Retrieve</option>
</select>
<button type="submit" class="btn btn-danger multi-action">Perform action</button>    

<!-- Hiding multi-action -->
    <style>
        .multi-action{
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
            <th>Email Used</th>
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
                    <td>{{ strip_tags(Str::limit($order->message, 30)) }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->created_at->diffForHumans() }}</td>
                    <td>{{ $order->created_at->diffForHumans() }}</td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-warning" href="{{ route('deleted_orders.show', $order->id) }}">View</a>
                            <a class="btn btn-success" href="{{ route('deleted_orders.retrieve', $order->id) }}">Restore</a>
                            <a class="btn btn-danger" href="{{ route('deleted_orders.terminate', $order->id) }}">Terminate</a>
                        </div>
                    </td>    
      
                    
                </tr>
            @endforeach
        @else
        <div class="alert alert-danger">
             YOU HAVE ZERO TRASHED ORDERS!  
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
                 $('.multi-action').fadeIn('slow');
                 $('.checkboxes').each(function(){
                     this.checked = true;
                 })
             }else{
                $('.multi-action').fadeOut('slow');
                $('.checkboxes').each(function(){
                     this.checked = false;
                 })
             }

           }); 

        // SINGLE SELECTION
           $('.checkboxes').click(function(){
               if(this.checked){
                 $('.multi-action').fadeIn('slow');
               }else{
                $('.multi-action').fadeOut('slow');
               }
           })
           
       });
   </script>
<!--  -->
@stop