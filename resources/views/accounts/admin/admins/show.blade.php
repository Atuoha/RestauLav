@extends('layouts.admin_layouts.template')
@section('page_name', 'Single User')

@section('content')



<section class="panel">
<header class="panel-heading no-border">
Single User | {{ $user->name }}
</header>

<div class="pull-right">
    <img width="100" class="img-circle" src="{{ $user->photo == '' ? '/images/default.png' : $user->photo->name   }}" alt="">
</div>

<table class="table table table-responsive table-bordered table-striped table-hover">
        <tbody>
            <tr>
                <th>Id</th>
                <td>{{ $user->id }}</td>
            </tr> 
                
                <tr>
                    <th>Fullname</th>
                    <td>{{ $user->name }}</td>
                </tr> 
            
                <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
                </tr>

                <tr>
                <th>Role</th>
                <td>{{ $user->role->name }}</td>
                </tr>

                <tr>
                <th>Status</th>
                <td> {{$user->status == 1 ? 'Active' : 'Not Active'}}</td>
                </tr>

                <tr>
                <th>Created</th>
                <td>{{ $user->created_at->diffForHumans() }}</td>
                </tr>

                <tr>
                <th>Last Update</th>
                <td>{{ $user->updated_at->diffForHumans() }}</td>
                </tr>

                <tr>
                <th>Delete Action</th>
                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUserController@destroy', $user->id] ]) !!}

                        {!! Form::submit('Delete user',['class'=>'btn btn-danger']) !!}

                    {!! Form::close() !!}
                </td>
                </tr>  

                <tr>
                <th>Edit user</th>
                <td><a class="btn btn-primary" href="{{ route('users.edit', $user->id)}}">Edit user</a></td>
                </tr>


        <tbody>
    </table>


</section>
@endsection