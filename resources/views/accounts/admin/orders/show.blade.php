@extends('layouts.user_layouts.template')
@section('page_name', 'Single order')

@section('content')



<section class="panel">
<header class="panel-heading no-border">
Single order | {{ $order->item }} | | You can only change your choice if the item has not yet been delivered
</header>

<div class="container">

<table class="table table table-responsive table-bordered table-striped table-hover">
        <tbody>
                <tr>
                    <th>Id</th>
                    <td>{{ $order->id }}</td>
                </tr>
                
                <tr>
                    <th>Name Used</th>
                    <td>{{ $order->user->name }}</td>
                </tr>

                 <tr>
                    <th>Email Used</th>
                    <td>{{ $order->user->email }}</td>
                </tr> 

                <tr>
                    <th>Contact Used</th>
                    <td>{{ $order->contact }}</td>
                </tr> 
                
                <tr>
                    <th>Address Used</th>
                    <td>{{ $order->address }}</td>
                </tr> 

                <tr>
                    <th>Item</th>
                    <td>{{ $order->item }}</td>
                </tr> 

                <tr>
                    <th>Quantity</th>
                    <td>{{ $order->quantity }}</td>
                </tr> 

                <tr>
                    <th>Price</th>
                    <td>${{ $order->price }}</td>
                </tr> 

                <tr>
                    <th>Total Price</th>
                    <td>${{ $order->total_price }}</td>
                </tr> 
            
                <tr>
                <th>Date</th>
                <td>{{ $order->date }}</td>
                </tr>

                <tr>
                <th>Time</th>
                <td>{{ $order->time }}</td>
                </tr>

                <tr>
                <th>Message</th>
                <td> {{ Str::limit($order->message, 30)}}</td>
                </tr>

                <tr>
                <th>Created</th>
                <td>{{ $order->created_at->diffForHumans() }}</td>
                </tr>

                <tr>
                <th>Last Update</th>
                <td>{{ $order->updated_at->diffForHumans() }}</td>
                </tr>

            
            @if($deleted_status == 'No Delete')    
                <tr>
                <th>Delete Action</th>
                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['UserOrdersController@destroy', $order->id] ]) !!}

                        {!! Form::submit('Delete Order',['class'=>'btn btn-danger']) !!}

                    {!! Form::close() !!}
                </td>
                </tr>  

                @if($order->status != 'Delivered')
                <tr>
                <th>Edit Reservation</th>
                <td><a class="btn btn-primary" href="{{ route('user_orders.edit', $order->id)}}">Edit Reservation</a></td>           
                </tr>
                @endif

            @endif    


        <tbody>
    </table>

</div>

</section>
@endsection