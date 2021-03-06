@extends('layouts.admin_layouts.template')
@section('page_name', 'All Dishes')

@section('content')
 
@if(session('DISH_CREATE'))
    <div class="alert alert-success">{{ session('DISH_CREATE') }}</div>
@endif

@if(session('DISH_DELETE'))
    <div class="alert alert-success">{{ session('DISH_DELETE') }}</div>
@endif

@if(session('DISH_UPDATE'))
    <div class="alert alert-success">{{ session('DISH_UPDATE') }}</div>
@endif

@if(session('DISH_RESTORE'))
    <div class="alert alert-success">{{ session('DISH_RESTORE') }}</div>
@endif

<section class="panel">
<header class="panel-heading no-border">
All Dishes
</header>
<div class="container">

<form action="/delete/dish" method="post">
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
        <th>Author</th>
        <th>Price</th>
        <th>Plan</th>
        <th>Category</th>
        <th>Photo</th>
        <th>Content</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
        <th>ACTIONS</th>
        </tr>
    </thead>
    <tbody>
        @if(count($dishes) > 0)
            @foreach($dishes as $dish)
            <tr>
            <td><input type="checkbox" value="{{ $dish->id }} " name="checkbox_array[]" class="checkboxes"></td>
 </form>
                <td>{{ $dish->id }}</td>
                <td>{{ $dish->name }}</td>
                <td>{{ $dish->user->name }}</td>
                <td>${{ $dish->price }}</td>
                <td>{{ $dish->food_plan }}</td>
                <td>{{ $dish->category->name }}</td>
                <td><img class="img-rounded" width="60" src="{{ $dish->photo->name }}" alt=""></td>
                <td>{{ strip_tags(Str::limit($dish->content, 30)) }}</td>
                <td>{{ $dish->status }}</td>
                <td>{{ $dish->created_at->diffForHumans() }}</td>
                <td>{{ $dish->updated_at->diffForHumans() }}</td>
                <td><a  class="btn btn-primary" href="{{ route('dishes.show', $dish->id) }}">View</a</td>
                <td><a class="btn btn-success" href="{{ route('dishes.edit', $dish->id) }}">Edit</a</td>
                @if($dish->status == 'Active')
                    <td>
                        {!! Form::open(['method'=>'PATCH', 'action'=>['DishController@update', $dish->id] ]) !!}
                            <input type="hidden" name="status" value="Inactive">
                            {!! Form::submit('Deactive', ['class'=>'btn btn-info']) !!}
                        {!! Form::close() !!}
                    </td>
                @else
                     <td>
                        {!! Form::open(['method'=>'PATCH', 'action'=>['DishController@update', $dish->id] ]) !!}
                           <input type="hidden" name="status" value="Active">
                            {!! Form::submit('Activate', ['class'=>'btn btn-warning']) !!}
                        {!! Form::close() !!}
                    </td>
                @endif

                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['DishController@destroy', $dish->id] ]) !!}
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>

            </tr>

            @endforeach
        @else
            <div class="alert alert-danger">NO DISHES YET!</div>
        @endif
    </tbody>
    </table>
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
