@include('includes.user_includes.head')
@include('includes.user_includes.header')
@include('includes.user_includes.sidebar')

<!--main content start-->
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i> @yield('page_name')</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="">Home</a></li>
              <li><i class="fa fa-bars"></i>@yield('page_name')</li>
            </ol>
          </div>
        </div>
                <!-- page start-->
                @yield('content')
                <!-- page end-->
      </section>
</section>
<!--main content end-->
