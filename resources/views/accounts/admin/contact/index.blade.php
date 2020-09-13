@extends('layouts.user_layouts.template')
@section('page_name', 'All Contacts')

@section('content')
<section class="panel">
<header class="panel-heading no-border">
Message Contacts
</header>

@if(session('CONTACT_CREATE'))
    <div class="alert alert-success">{{ session('CONTACT_CREATE') }}</div>
@endif

@if(session('CONTACT_DELETE'))
    <div class="alert alert-success">{{ session('CONTACT_DELETE') }}</div>
@endif

@if(session('CONTACT_UPDATE'))
    <div class="alert alert-success">{{ session('CONTACT_UPDATE') }}</div>
@endif

<table class="table table-bordered table-responsive">
    <thead>
        <tr>
        <th>#</th>
        <th>Name Used</th>
        <th>Email Used</th>
        <th>Subject</th>
        <th>Message</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
        
        @if(count($contacts) > 0)
           @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->user->name }}</td>
                <td>{{ $contact->user->email }}</td>
                <td>{{ $contact->subject }}</td>
                <td>{{ $contact->message }}</td>
                <td>{{ $contact->created_at->diffForHumans() }}</td>
                <td>{{ $contact->updated_at->diffForHumans() }}</td>
               
                <td><a class="btn btn-success" href="{{ route('user_contact.edit', $contact->id) }}">Edit</a></td>
                <td><a class="btn btn-warning" href="{{ route('user_contact.show', $contact->id) }}">View</a></td>
                <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['UserContactController@destroy', $contact->id] ]) !!}
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                </td>



            </tr>
            @endforeach
        @else
        <div class="alert alert-danger">
            NO CONTACTS YET! WHY NOT MAKE ONE.
            <a class="btn btn-success" href="{{ route('user_contact.create') }}"> - Create</a>
        </div>
        @endif

    </tbody>
    </table>

    <div class="col-sm-6">
        <div class="col-sm-6 col-off-sm-5">
            {{ $contacts->render() }}
        </div>
    </div>

</section>
@endsection