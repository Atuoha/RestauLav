@extends('layouts.admin_layouts.template')
@section('page_name', 'All Trashed Reservations')

@section('content')
 

@if(session('RESERVATION_DELETE'))
    <div class="alert alert-success">{{ session('RESERVATION_DELETE') }}</div>
@endif

<section class="panel">
<header class="panel-heading no-border">
All Trashed Reservations | We just kept them safe for you just in case you feel like...
</header>

<form action="/action/reserve" method="post">
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
        <th>Name Used</th>
        <th>Email Used</th>
        <th>Contact</th>
        <th>Table For</th>
        <th>Date</th>
        <th>Time</th>
        <th>Message</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if(count($reservations) > 0)
            @foreach($reservations as $reserve)
            <tr>
                <td><input type="checkbox" value="{{ $reserve->id }} " name="checkbox_array[]" class="checkboxes"></td>
 </form>
                    <td>{{ $reserve->id }}</td>
                    <td>{{ $reserve->user->name }}</td>
                    <td>{{ $reserve->email }}</td>
                    <td>{{ $reserve->contact }}</td>
                    <td>{{ $reserve->table_number }}</td>
                    <td>{{ $reserve->date }}</td>
                    <td>{{ $reserve->time }}</td>
                    <td>{{ strip_tags(Str::limit($reserve->message, 20)) }}</td>
                    <td>Cancelled</td>
                    <td>{{ $reserve->created_at->diffForHumans() }}</td>
                    <td>{{ $reserve->updated_at->diffForHumans() }}</td>
        
                    <td><a class="btn btn-success" href="{{ route('admin_deleted_reserve.show', $reserve->id) }}">View</a></td>
                    <td><a class="btn btn-warning" href="{{ route('admin_deleted_reserve.retrieve', $reserve->id) }}">Retrieve</a></td>
                    <td><a class="btn btn-danger" href="{{ route('admin_deleted_reserve.terminate', $reserve->id) }}">Terminate Permanently</a></td>

                </tr>
            @endforeach
        @else
            <div class="alert alert-danger">
                YOU HAVE ZERO CANCELLED RESERVATIONS! 
            </div>
        @endif
        
    </tbody>
    </table>

    <div class="col-sm-6">
        <div class="col-sm-6 col-off-sm-5">
            {{ $reservations->render() }}
        </div>
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