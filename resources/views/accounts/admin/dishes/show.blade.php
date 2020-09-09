@extends('layouts.admin_layouts.template')
@section('page_name', 'Single Dish')

@section('content')



<section class="panel">
<header class="panel-heading no-border">
Single Dish | {{ $dish->name }}
</header>

<div class="container">
<div class="pull-right">
    <img width="100" class="img-circle" src="{{ $dish->photo == '' ? '/images/default.png' : $dish->photo->name   }}" alt="">
</div>

<table class="table table table-responsive table-bordered table-striped table-hover">
        <tbody>
            <tr>
                <th>Id</th>
                <td>{{ $dish->id }}</td>
            </tr> 
                
                <tr>
                    <th>Name</th>
                    <td>{{ $dish->name }}</td>
                </tr> 
            
                <tr>
                <th>Cook</th>
                <td>{{ $dish->user->name }}</td>
                </tr>

                <tr>
                <th>Category</th>
                <td>{{ $dish->category->name }}</td>
                </tr>

                <tr>
                <th>Food Plan</th>
                <td> {{$dish->food_plan}}</td>
                </tr>

                <tr>
                <th>Content</th>
                <td> {{ Str::limit($dish->content, 30)}}</td>
                </tr>

                <tr>
                <th>Created</th>
                <td>{{ $dish->created_at->diffForHumans() }}</td>
                </tr>

                <tr>
                <th>Last Update</th>
                <td>{{ $dish->updated_at->diffForHumans() }}</td>
                </tr>
            
            @if($deleted_status == 'No Delete')    
                <tr>
                <th>Delete Action</th>
                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['DishController@destroy', $dish->id] ]) !!}

                        {!! Form::submit('Delete dish',['class'=>'btn btn-danger']) !!}

                    {!! Form::close() !!}
                </td>
                </tr>  

                <tr>
                <th>Edit dish</th>
                <td><a class="btn btn-primary" href="{{ route('dishes.edit', $dish->id)}}">Edit dish</a></td>           
                </tr>

            @endif    


        <tbody>
    </table>

</div>

</section>
@endsection