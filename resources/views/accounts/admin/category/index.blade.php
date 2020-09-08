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
        <table class="table table-bordered">
            <thead>
                <tr>
                <th>#</th>
                <th>Name</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($categories)
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td><a class="btn btn-primary" href="{{ route('categories.edit', $category->id) }}"> Edit Category</a></td>
                            <td>
                                {!! Form::open(['method'=>'DELETE', 'action'=>['CategoryController@destroy', $category->id] ]) !!}
                                   {!! Form::submit('Delete Category', ['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                            

                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>    

    <div class="col-sm-6">
        {{ $categories->render() }}
    </div>
        
    </div>
</div>
  
</section>
@endsection