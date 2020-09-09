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

<div class="row">
    <div class="col-sm-6">
        {!! Form::open(['method'=>'POST', 'action'=>'PhotoController@store', 'class'=>'dropzone']) !!}
            
        <!-- dROPZONE Externals -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
        <!--  -->

        {!! Form::close() !!}
    </div>

    <div class="col-sm-6">
        All Media
      
    <table class="table table-bordered">
    <thead>
        <tr>
        <th>#</th>
        <th>Photo</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if($photos)
            @foreach($photos as $photo)
                <tr>
                    <td>{{ $photo->id }}</td>
                    <td><img src="{{ $photo->name }}" alt=""></td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['PhotoController@destroy', $photo->id] ]) !!}
                            {!! Form::submit('Delete Photo', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @endif 
    </tbody>
    </table>  

    <div class="col-sm-6">
        {{ $photos->render() }}
    </div>
    </div>
</div>


</section>
@endsection