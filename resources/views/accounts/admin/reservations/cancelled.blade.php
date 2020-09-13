@extends('layouts.admin_layouts.template')
@section('page_name', 'All Trashed Reservations')

@section('content')
 

@if(session('RESERVATION_DELETE'))
    <div class="alert alert-success">{{ session('RESERVATION_DELETE') }}</div>
@endif

<section class="panel">
<header class="panel-heading no-border">
All Trashed Reservations | We just kept them safe for you just in case you feel like...
</header>
    <table class="table table-bordered table-responsive">
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
                    <td>Cancelled</td>
                    <td>{{ $reserve->created_at->diffForHumans() }}</td>
                    <td>{{ $reserve->updated_at->diffForHumans() }}</td>
        
                    <td><a class="btn btn-success" href="{{ route('admin_deleted_reserve.show', $reserve->id) }}">View</a></td>
                    <td><a class="btn btn-warning" href="{{ route('admin_deleted_reserve.retrieve', $reserve->id) }}">Retrieve</a></td>
                    <td><a class="btn btn-danger" href="{{ route('admin_deleted_reserve.terminate', $reserve->id) }}">Terminate Permanently</a></td>

                </tr>
            @endforeach
        @else
            <div class="alert alert-danger">
                YOU HAVE ZERO CANCELLED RESERVATIONS! 
            </div>
        @endif
        
    </tbody>
    </table>

    <div class="col-sm-6">
        <div class="col-sm-6 col-off-sm-5">
            {{ $reservations->render() }}
        </div>
    </div>
</section>
@endsection