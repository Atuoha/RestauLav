@extends('layouts.admin_layouts.template')
@section('page_name', 'Dashboard')

@section('content')
    

<section class="panel">
<header class="panel-heading no-border">
Dashboard
</header>
<div  style="padding:10px;">
    <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg">
              <i class="fa fa-document"></i>
              <div class="count">6.674</div>
              <div class="title">Testimonies</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box brown-bg">
              <i class="fa fa-chair"></i>
              <div class="count">7.538</div>
              <div class="title">Reservations</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box dark-bg">
              <i class="fa fa-thumbs-o-up"></i>
              <div class="count">4.362</div>
              <div class="title">Cancelled Reservations</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box green-bg">
              <i class="fa fa-envelope"></i>
              <div class="count">1.426</div>
              <div class="title">Contacts</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

        </div>
        <!--/.row-->


       
</div>
</section>
@endsection