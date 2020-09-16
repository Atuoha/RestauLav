@extends('layouts.admin_layouts.template')
@section('page_name', 'All Categories')

@section('content')
 
@if(session('CATEGORY_CREATE'))
    <div class="alert alert-success">{{ session('CATEGORY_CREATE') }}</div>
@endif

@if(session('CATEGORY_DELETE'))
    <div class="alert alert-success">{{ session('CATEGORY_DELETE') }}</div>
@endif

@if(session('CATEGORY_UPDATE'))
    <div class="alert alert-success">{{ session('CATEGORY_UPDATE') }}</div>
@endif


<section class="panel">
<header class="panel-heading no-border">
All Categories
</header>

<div class="row" style="padding:10px;">
    <div class="col-sm-6">
        {!! Form::open(['method'=>'POST', 'action'=>'CategoryController@store']) !!}
            
            <div class="form-group">
                {!! Form::label('name', 'Category Name', ['control-label']) !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Create Category', ['class'=>'btn btn-success']) !!}
            </div>
        {!! Form::close() !!}
    </div>

    <div class="col-sm-6">
        All Categories
      <form action="/delete/category" method="post">
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
                <th>Created</th>
                <th>Updated</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($categories) > 0)
                    @foreach($categories as $category)
                    <tr>
                             <td><input type="checkbox" value="{{ $category->id }} " name="checkbox_array[]" class="checkboxes"></td>
             </form>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->created_at->diffForHumans() }}</td>
                            <td>{{ $category->updated_at->diffForHumans() }}</td>
                            <td><a class="btn btn-primary" href="{{ route('categories.edit', $category->id) }}"> Edit Category</a></td>
                            <td>
                                {!! Form::open(['method'=>'DELETE', 'action'=>['CategoryController@destroy', $category->id] ]) !!}
                                   {!! Form::submit('Delete Category', ['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                            

                        </tr>
                    @endforeach
                @else
                 <div class="alert alert-danger">NO CATEGORIES YET!</div>
                 @endif
            </tbody>
        </table>    

    <div class="col-sm-6">
        {{ $categories->render() }}
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