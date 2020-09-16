@extends('layouts.user_layouts.template')
@section('page_name', 'Single contact')

@section('content')



<section class="panel">
<header class="panel-heading no-border">
Single contact | {{ $contact->subject }}
</header>

<div class="container">

<table class="table table table-responsive table-bordered table-striped table-hover">
        <tbody>
                <tr>
                    <th>Id</th>
                    <td>{{ $contact->id }}</td>
                </tr>
                
                <tr>
                    <th>Name Used</th>
                    <td>{{ $contact->user->name }}</td>
                </tr>

                 <tr>
                    <th>Email Used</th>
                    <td>{{ $contact->user->email }}</td>
                </tr> 

                <tr>
                    <th>Subject</th>
                    <td>{{ $contact->subject }}</td>
                </tr> 
                
                <tr>
                <th>Message</th>
                <td> {{ strip_tags(Str::limit($contact->message, 30)) }}</td>
                </tr>

                <tr>
                <th>Created</th>
                <td>{{ $contact->created_at->diffForHumans() }}</td>
                </tr>

                <tr>
                <th>Last Update</th>
                <td>{{ $contact->updated_at->diffForHumans() }}</td>
                </tr>

            
                <tr>
                <th>Delete Action</th>
                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['UserContactController@destroy', $contact->id] ]) !!}

                        {!! Form::submit('Delete Contact',['class'=>'btn btn-danger']) !!}

                    {!! Form::close() !!}
                </td>
                </tr>  

                <tr>
                <th>Edit Contact</th>
                <td><a class="btn btn-primary" href="{{ route('user_contact.edit', $contact->id)}}">Edit Reservation</a></td>           
                </tr>



        <tbody>
    </table>

</div>

</section>
@endsection