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
    <table class="table table-bordered">
    <thead>
        <tr>
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
                <td>{{ $dish->id }}</td>
                <td>{{ $dish->name }}</td>
                <td>{{ $dish->user->name }}</td>
                <td>${{ $dish->price }}</td>
                <td>{{ $dish->food_plan }}</td>
                <td>{{ $dish->category->name }}</td>
                <td><img class="img-rounded" width="60" src="{{ $dish->photo->name }}" alt=""></td>
                <td>{{ Str::limit($dish->content, 30) }}</td>
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
@endsection