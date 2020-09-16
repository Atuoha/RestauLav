@extends('layouts.admin_layouts.template')
@section('page_name', 'All Deleted Dishes')

@section('content')
 
@if(session('DISH_CREATE'))
    <div class="alert alert-success">{{ session('DISH_CREATE') }}</div>
@endif

@if(session('DISH_DELETE'))
    <div class="alert alert-success">{{ session('DISH_DELETE') }}</div>
@endif



<section class="panel">
<header class="panel-heading no-border">
All Deleted Dishes
</header>
<div class="container">
    
<form action="/action/dish" method="post">
 {{ csrf_field() }}   
 {{ method_field('put') }}

<select name="action" required class="form-control multi-action col-md-4" id="">
    <option value="" disabled selected>Select Option</option>
    <option value="terminate">Termainate</option>
    <option value="retrieve">Retrieve</option>
</select>
<button type="submit" class="btn btn-danger multi-action">Perform action</button>    

<!-- Hiding multi-action -->
    <style>
        .multi-action{
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
                <td><a  class="btn btn-warning" href="{{ route('deleted.show', $dish->id) }}">View</a</td>
                <td><a class="btn btn-success" href="{{ route('deleted.restore', $dish->id) }}">Restore</a</td>
                <td><a class="btn btn-danger" href="{{ route('deleted.terminate', $dish->id) }}">Terminate</a</td>
            </tr>   

            @endforeach
        @else
            <div class="alert alert-danger">NO DELETED DISH YET!</div>
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
                 $('.multi-action').fadeIn('slow');
                 $('.checkboxes').each(function(){
                     this.checked = true;
                 })
             }else{
                $('.multi-action').fadeOut('slow');
                $('.checkboxes').each(function(){
                     this.checked = false;
                 })
             }

           }); 

        // SINGLE SELECTION
           $('.checkboxes').click(function(){
               if(this.checked){
                 $('.multi-action').fadeIn('slow');
               }else{
                $('.multi-action').fadeOut('slow');
               }
           })
           
       });
   </script>
<!--  -->
@endsection