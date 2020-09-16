@extends('layouts.admin_layouts.template')
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

<form action="/delete/testimony" method="post">
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
            <td><input type="checkbox" value="{{ $testimony->id }} " name="checkbox_array[]" class="checkboxes"></td>
 </form>
                <td>{{ $testimony->id }}</td>
                <td>{{ $testimony->user->name }}</td>
                <td>{{ $testimony->user->name }}</td>
                <td>{{ $testimony->job_title }}</td>
                <td>{{ strip_tags($testimony->message, 30)) }}</td>
                <td>{{ $testimony->created_at->diffForHumans() }}</td>
                <td>{{ $testimony->updated_at->diffForHumans() }}</td>
               
                <td><a class="btn btn-success" href="{{ route('admin_testimonies.edit', $testimony->id) }}">Edit</a></td>
                <td><a class="btn btn-warning" href="{{ route('admin_testimonies.show', $testimony->id) }}">View</a></td>
                <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminTestimonyController@destroy', $testimony->id] ]) !!}
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                </td>



            </tr>
            @endforeach
        @else
        <div class="alert alert-danger">
            NO TESTIMONIES YET! WHY NOT MAKE ONE. 
            <a class="btn btn-success" href="{{ route('admin_testimonies.create') }}"> - Create</a>

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