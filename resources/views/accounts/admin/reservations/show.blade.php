@extends('layouts.admin_layouts.template')
@section('page_name', 'Single reserve')

@section('content')



<section class="panel">
<header class="panel-heading no-border">
Single reserve | {{ $reserve->table_number }}
</header>

<div class="container">

<table class="table table table-responsive table-bordered table-striped table-hover">
        <tbody>
                <tr>
                    <th>Id</th>
                    <td>{{ $reserve->id }}</td>
                </tr>
                
                <tr>
                    <th>Name Used</th>
                    <td>{{ $reserve->user->name }}</td>
                </tr>

                 <tr>
                    <th>Email Used</th>
                    <td>{{ $reserve->email }}</td>
                </tr> 

                <tr>
                    <th>Contact Used</th>
                    <td>{{ $reserve->contact }}</td>
                </tr> 
                
                <tr>
                    <th>Table For</th>
                    <td>{{ $reserve->table_number }}</td>
                </tr> 
            
                <tr>
                <th>Date</th>
                <td>{{ $reserve->date }}</td>
                </tr>

                <tr>
                <th>Time</th>
                <td>{{ $reserve->time }}</td>
                </tr>

                <tr>
                <th>Message</th>
                <td> {{ strip_tags(Str::limit($reserve->message, 20)) }}</td>
                </tr>

                <tr>
                <th>Created</th>
                <td>{{ $reserve->created_at->diffForHumans() }}</td>
                </tr>

                <tr>
                <th>Last Update</th>
                <td>{{ $reserve->updated_at->diffForHumans() }}</td>
                </tr>

            
            @if($deleted_status == 'No Delete')    
                <tr>
                <th>Delete/Cancel Action</th>
                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminReservationController@destroy', $reserve->id] ]) !!}

                        {!! Form::submit('Delete/Cancel Reservation',['class'=>'btn btn-danger']) !!}

                    {!! Form::close() !!}
                </td>
                </tr>  

                <tr>
                <th>Edit Reservation</th>
                <td><a class="btn btn-primary" href="{{ route('admin_reserve.edit', $reserve->id)}}">Edit Reservation</a></td>           
                </tr>

                <tr>
                <th>Status</th>
                <td>
                    @if($reserve->status == 'Active')
                    {!! Form::open(['method'=>'PATCH', 'action'=>['AdminReservationController@update', $reserve->id] ]) !!}
                        <input type="hidden" name="status" value="Unactive">
                            {!! Form::submit('Approve', ['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    @else
                        {!! Form::open(['method'=>'PATCH', 'action'=>['AdminReservationController@update', $reserve->id] ]) !!}
                            <input type="hidden" name="status" value="Active">
                                {!! Form::submit('Unapprove', ['class'=>'btn btn-info']) !!}
                        {!! Form::close() !!}
                    @endif
                </td>
                
                </tr>

            @endif    


        <tbody>
    </table>

</div>

</section>
@endsection