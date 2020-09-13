@extends('layouts.admin_layouts.template')
@section('page_name', 'Single Testimony')

@section('content')



<section class="panel">
<header class="panel-heading no-border">
Single Testimony 
</header>

<div class="container">

<table class="table table table-responsive table-bordered table-striped table-hover">
        <tbody>
                <tr>
                    <th>Id</th>
                    <td>{{ $testimony->id }}</td>
                </tr>
                
                <tr>
                    <th>Name Used</th>
                    <td>{{ $testimony->user->name }}</td>
                </tr>

                 <tr>
                    <th>Email Used</th>
                    <td>{{ $testimony->user->email }}</td>
                </tr> 

                <tr>
                    <th>Job Title Used</th>
                    <td>{{ $testimony->job_title }}</td>
                </tr> 
                
                <tr>
                <th>Message</th>
                <td> {{ Str::limit($testimony->message, 30)}}</td>
                </tr>

                <tr>
                <th>Created</th>
                <td>{{ $testimony->created_at->diffForHumans() }}</td>
                </tr>

                <tr>
                <th>Last Update</th>
                <td>{{ $testimony->updated_at->diffForHumans() }}</td>
                </tr>

            
                <tr>
                <th>Delete Action</th>
                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminTestimonyController@destroy', $testimony->id] ]) !!}

                        {!! Form::submit('Delete Testimony',['class'=>'btn btn-danger']) !!}

                    {!! Form::close() !!}
                </td>
                </tr>  

                <tr>
                <th>Edit testimony</th>
                <td><a class="btn btn-primary" href="{{ route('admin_testimonies.edit', $testimony->id)}}">Edit Reservation</a></td>           
                </tr>



        <tbody>
    </table>

</div>

</section>
@endsection