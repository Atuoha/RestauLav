@extends('layouts.user_layouts.template')
@section('page_name', 'All Reservations')

@section('content')
 
@if(session('RESERVATION_CREATE'))
    <div class="alert alert-success">{{ session('RESERVATION_CREATE') }}</div>
@endif

@if(session('RESERVATION_DELETE'))
    <div class="alert alert-success">{{ session('RESERVATION_DELETE') }}</div>
@endif

@if(session('RESERVATION_UPDATE'))
    <div class="alert alert-success">{{ session('RESERVATION_UPDATE') }}</div>
@endif

@if(session('RESERVATION_RETRIEVE'))
    <div class="alert alert-success">{{ session('RESERVATION_RETRIEVE') }}</div>
@endif

<section class="panel">
<header class="panel-heading no-border">
All Reservations
</header>


    <table class="table table-bordered">
    <thead>
        <tr>
        <th>#</th>
        <th>Name Used</th>
        <th>Email Used</th>
        <th>Contact</th>
        <th>Table For</th>
        <th>Date</th>
        <th>Time</th>
        <th>Message</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if(count($reservations) > 0)
            @foreach($reservations as $reserve)
                <tr>
                    <td>{{ $reserve->id }}</td>
                    <td>{{ $reserve->user->name }}</td>
                    <td>{{ $reserve->email }}</td>
                    <td>{{ $reserve->contact }}</td>
                    <td>{{ $reserve->table_number }}</td>
                    <td>{{ $reserve->date }}</td>
                    <td>{{ $reserve->time }}</td>
                    <td>{{ Str::limit($reserve->message, 20) }}</td>
                    <td>{{ $reserve->status }}</td>
                    <td>{{ $reserve->created_at->diffForHumans() }}</td>
                    <td>{{ $reserve->updated_at->diffForHumans() }}</td>
        
                    <td><a class="btn btn-success" href="{{ route('user_reserve.edit', $reserve->id) }}">Edit</a></td>
                    <td><a class="btn btn-warning" href="{{ route('user_reserve.show', $reserve->id) }}">View</a></td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['UserReservationController@destroy', $reserve->id] ]) !!}
                            {!! Form::submit('Delete/Cancel', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>


                </tr>
            @endforeach
        @else
            <div class="alert alert-danger">
                YOU HAVE ZERO RESERVATIONS! 
            </div>
        @endif
        
    </tbody>
    </table>
</section>
@endsection