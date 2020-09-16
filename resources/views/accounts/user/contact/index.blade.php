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

<form action="/delete/contact" method="post">
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
                <td><input type="checkbox" value="{{ $contact->id }} " name="checkbox_array[]" class="checkboxes"></td>
 </form>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->user->name }}</td>
                <td>{{ $contact->user->email }}</td>
                <td>{{ $contact->subject }}</td>
                <td>{{ strip_tags(Str::limit($contact->message, 30)) }}</td>
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