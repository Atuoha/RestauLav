@extends('layouts.admin_layouts.template')
@section('page_name', 'All Users')

@section('content')

@if(session('USER_CREATE'))
    <div class="alert alert-success">{{ session('USER_CREATE') }}</div>
@endif

@if(session('USER_DELETE'))
    <div class="alert alert-success">{{ session('USER_DELETE') }}</div>
@endif

@if(session('USER_UPDATE'))
    <div class="alert alert-success">{{ session('USER_UPDATE') }}</div>
@endif

<section class="panel">
<header class="panel-heading no-border">
All Registered Users
</header>
    <table class="table table-bordered">
    <thead>
        <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Photo</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>

        @if($users)
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>{{ $user->status }}</td>
                    <td><img width="50" class="img-circle" src="{{ $user->photo == '' ? '/images/default.png' : $user->photo->name   }}" alt=""></td>
                    <td><a  class="btn btn-primary" href="{{ route('users.show', $user->id) }}">View</a</td>
                    <td><a class="btn btn-success" href="{{ route('users.edit', $user->id) }}">Edit</a</td>

                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUserController@destroy', $user->id] ]) !!}
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @endif
        
    </tbody>
    </table>

    <div class="col-sm-6">
        <div class="col-sm-6 col-off-sm-5">
            {{ $users->render() }}
        </div>
    </div>
</section>
@endsection