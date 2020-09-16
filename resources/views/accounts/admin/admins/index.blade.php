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

<form action="/delete/user" method="post">
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
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Job_Title</th>
        <th>Status</th>
        <th>Photo</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>

        @if(count($users) > 1)
            @foreach($users as $user)
            <tr>
            <td><input type="checkbox" value="{{ $user->id }} " name="checkbox_array[]" class="checkboxes"></td>
 </form>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>{{ $user->job_title == '' ? 'Not a Staff' : $user->job_title }}</td>
                    <td>{{ $user->status == 1 ? 'Active' : 'Inactive' }}</td>
                    <td><img width="50" class="img-circle" src="{{ $user->photo == '' ? '/images/default.png' : $user->photo->name   }}" alt=""></td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                    <td><a  class="btn btn-primary" href="{{ route('users.show', $user->id) }}">View</a</td>
                    <td><a class="btn btn-success" href="{{ route('users.edit', $user->id) }}">Edit</a</td>

                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUserController@destroy', $user->id] ]) !!}
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @else
            <div class="alert alert-danger">NO USERS YET EXCEPT YOU!</div>
        @endif
        
    </tbody>
    </table>

    <div class="col-sm-6">
        <div class="col-sm-6 col-off-sm-5">
            {{ $users->render() }}
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
@endsection