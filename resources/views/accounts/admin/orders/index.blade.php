@extends('layouts.admin_layouts.template')
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

<table class="table table-bordered table-responsive">
    <thead>
        <tr>
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
                            <a class="btn btn-success mb-2" href="{{ route('admin_orders.edit', $order->id) }}">Edit</a>
                            @endif

                            @if($order->status == 'Delivered')
                                {!! Form::open(['method'=>'PATCH', 'action'=>['AdminOrdersController@update', $order->id] ]) !!}
                                   <input type="hidden" name="status" value="Not Delivered">
                                     {!! Form::submit('Not Delivrd', ['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            @else
                                {!! Form::open(['method'=>'PATCH', 'action'=>['AdminOrdersController@update', $order->id] ]) !!}
                                    <input type="hidden" name="status" value="Delivered">
                                     {!! Form::submit('Delivrd', ['class'=>'btn btn-info']) !!}
                                {!! Form::close() !!}
                            @endif
                            
                            <a class="btn btn-warning" href="{{ route('admin_orders.show', $order->id) }}">View</a>

                            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminOrdersController@destroy', $order->id] ]) !!}
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}

                         </div>
                    </td>
               
                </tr>
            @endforeach
        @else
        <div class="alert alert-danger">
            NO ORDERS YET!. 

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

@stop