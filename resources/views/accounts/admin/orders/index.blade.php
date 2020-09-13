@extends('layouts.user_layouts.template')
@section('page_name', 'All Orders')

@section('content')
<section class="panel">
<header class="panel-heading no-border">
Orders
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

<table class="table table-bordered table-responsive">
    <thead>
        <tr>
            <th>#</th>
            <th>Name Used</th>
            <th>Email Used</th>
            <th>Contact Used</th>
            <th>Address Used</th>
            <th>Item</th>
            <th>Quantity</th>
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
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->item }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->price }}</td>
                    <td>{{ $order->time }}</td>
                    <td>{{ $order->date }}</td>
                    <td>{{ $order->message }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->created_at->diffForHumans() }}</td>
                    <td>{{ $order->created_at->diffForHumans() }}</td>

                    <td><a class="btn btn-success" href="{{ route('user_orders.edit', $order->id) }}">Edit</a></td>
                    <td><a class="btn btn-warning" href="{{ route('user_orders.show', $order->id) }}">View</a></td>
                    <td>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['UserOrdersController@destroy', $order->id] ]) !!}
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}
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

@stop