@extends('layouts.template')
@section('title', 'RestauLav')

@section('content')
<main id="main">

<!-- INCLUDES -->
@include('includes.hero_section')
@include('includes.about')
@include('includes.why_us')
@include('includes.menu')
@include('includes.special_items')
@include('includes.events')
@include('booking')
@include('includes.testimony')
@include('includes.gallary')
@include('includes.staff')
@include('includes.contact')


</main><!-- End #main -->


@stop