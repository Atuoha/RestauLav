@extends('layouts.user_layouts.template')
@section('page_name', 'All Testimonies')

@section('content')
<section class="panel">
<header class="panel-heading no-border">
Testimonies
</header>

@if(session('TESTIMONY_CREATE'))
    <div class="alert alert-success">{{ session('TESTIMONY_CREATE') }}</div>
@endif

@if(session('TESTIMONY_DELETE'))
    <div class="alert alert-success">{{ session('TESTIMONY_DELETE') }}</div>
@endif

@if(session('TESTIMONY_UPDATE'))
    <div class="alert alert-success">{{ session('TESTIMONY_UPDATE') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
        <th>#</th>
        <th>Name Used</th>
        <th>Email Used</th>
        <th>Job_Title Used</th>
        <th>Message</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
        
        @if(count($testimonies) > 0)
           @foreach($testimonies as $testimony)
            <tr>
                <td>{{ $testimony->id }}</td>
                <td>{{ $testimony->user->name }}</td>
                <td>{{ $testimony->user->name }}</td>
                <td>{{ $testimony->job_title }}</td>
                <td>{{ $testimony->message }}</td>
                <td>{{ $testimony->created_at->diffForHumans() }}</td>
                <td>{{ $testimony->updated_at->diffForHumans() }}</td>
               
                <td><a class="btn btn-success" href="{{ route('user_testimonies.edit', $testimony->id) }}">Edit</a></td>
                <td><a class="btn btn-warning" href="{{ route('user_testimonies.show', $testimony->id) }}">View</a></td>
                <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['UserTestimonyController@destroy', $testimony->id] ]) !!}
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                </td>



            </tr>
            @endforeach
        @else
        <div class="alert alert-danger">
            NO TESTIMONIES YET! WHY NOT MAKE ONE. 
            <a class="btn btn-success" href="{{ route('user_testimonies.create') }}"> - Create</a>

        </div>
        @endif

    </tbody>
    </table>

    <div class="col-sm-6">
        <div class="col-sm-6 col-off-sm-5">
            {{ $testimonies->render() }}
        </div>
    </div>

</section>
@endsection