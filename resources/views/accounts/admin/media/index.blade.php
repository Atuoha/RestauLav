@extends('layouts.admin_layouts.template')
@section('page_name', 'All Media')

@section('content')

@if(session('MEDIA_CREATE'))
    <div class="alert alert-success">{{ session('MEDIA_CREATE') }}</div>
@endif

@if(session('MEDIA_DELETE'))
    <div class="alert alert-success">{{ session('MEDIA_DELETE') }}</div>
@endif

<section class="panel">
<header class="panel-heading no-border">
All Media
</header>
<div class="container">

<div class="row">
    <div class="col-sm-6" style="margin-top:10px;">
        Select Imagery(s) to upload
        {!! Form::open(['method'=>'POST', 'action'=>'PhotoController@store', 'class'=>'dropzone']) !!}
            
        <!-- dROPZONE Externals -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
        <!--  -->

        {!! Form::close() !!}
    </div>

    <div class="col-sm-6">
        All Media
      
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
        <th>Photo</th>
        <th>Created</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if(count($photos) > 0)
            @foreach($photos as $photo)
            <tr>
            <td><input type="checkbox" value="{{ $photo->id }} " name="checkbox_array[]" class="checkboxes"></td>
 </form>
                    <td>{{ $photo->id }}</td>
                    <td><img width="60" src="{{ $photo->name }}" alt=""></td>
                    <td>{{ $photo->created_at->diffForHumans() }}</td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['PhotoController@destroy', $photo->id] ]) !!}
                            {!! Form::submit('Delete Photo', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @else
            <div class="alert alert-danger">NO MEDIAS YET!</div>
        @endif
    </tbody>
    </table>  

    <div class="col-sm-6">
        {{ $photos->render() }}
    </div>
    </div>
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