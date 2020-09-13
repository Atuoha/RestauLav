@extends('layouts.user_layouts.template')
@section('page_name', 'USER Dashboard')

@section('content')
    

<section class="panel">
<header class="panel-heading no-border">
Dashboard
</header>
<div  style="padding:10px;">
    <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg">
              <i class="fa fa-shopping-cart"></i>
              <div class="count">{{ count($orders) }}</div>
              <div class="title">Successful Orders</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box brown-bg">
              <i class="fa fa-book"></i>
              <div class="count">{{ count($reservations ) }}</div>
              <div class="title">Active Reservations</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box dark-bg">
              <i class="fa fa-thumbs-o-up"></i>
              <div class="count">{{ count($testimonies) }}</div>
              <div class="title">Stabled Testimonies</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box green-bg">
              <i class="fa fa-envelope"></i>
              <div class="count">{{ count($contacts) }}</div>
              <div class="title">Approved Contacts</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

        </div>
        <!--/.row-->




         <!-- Profile activity start -->
         <div class="row">
          <div class="col-md-5 portlets">
            <!-- Widget -->
            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="pull-left">Reservation</div>
                <div class="widget-icons pull-right">
                  <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                </div>
                <div class="clearfix"></div>
              </div>

              <div class="panel-body">
              <table class="table">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Table</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @if(count($reservations) > 0)
                      @foreach($reservations as $reserve)
                          <tr>
                              <td>{{ $reserve->id }}</td>
                              <td>{{ $reserve->table_number }}</td>
                              <td>{{ $reserve->date }}</td>
                              <td>{{ $reserve->time }}</td>
                  
                              <td><a class="btn btn-success" href="{{ route('user_reserve.edit', $reserve->id) }}">Edit</a></td>
                              <td><a class="btn btn-warning" href="{{ route('user_reserve.show', $reserve->id) }}">View</a></td>
                              <td>
                                  {!! Form::open(['method'=>'DELETE', 'action'=>['UserReservationController@destroy', $reserve->id] ]) !!}
                                      {!! Form::submit('Cancel', ['class'=>'btn btn-danger']) !!}
                                  {!! Form::close() !!}
                              </td>


                          </tr>
                      @endforeach
                  @else
                        <div class="alert alert-danger">
                            YOU HAVE ZERO RESERVATIONS! WHY NOT MAKE ONE
                            <a class="btn btn-success" href="{{ route('user_reserve.create') }}"> - Create</a>
                        </div>
                  @endif
                    
                </tbody>
                </table>

                <div class="col-sm-6">
                    <div class="col-sm-6 col-off-sm-5">
                        {{ $reservations->render() }}
                    </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-7">
            <!--Reservation Activity start-->
            <section class="panel">
              <div class="panel-body progress-panel">
                <div class="row">
                  <div class="col-lg-8 task-progress pull-left">
                    <h1>Orders</h1>
                  </div>
                  <div class="col-lg-4">
                    <span class="profile-ava pull-right">
                       <img width="50" src="{{ Auth::user()->photo == '' ? '/images/default.png' : Auth::user()->photo->name   }}" alt="">
                        {{ Auth::user()->name }}
                      </span>
                  </div>
                </div>
              </div>
              <table class="table table-hover personal-task">
              <thead>
                    <tr>
                        <th>#</th>
                        <th>Item</th>
                        <th>Quant</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($orders) > 0)
                    @foreach($orders as $order)
                        <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->item }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>${{ $order->price }}</td>
                        <td>${{ $order->total_price }}</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            <div class="btn-group">
                                @if($order->status != 'Delivered')
                                <a class="btn btn-success mb-2" href="{{ route('user_orders.edit', $order->id) }}">Edit</a>
                                @endif
                                
                                <a class="btn btn-warning" href="{{ route('user_orders.show', $order->id) }}">View</a>

                                {!! Form::open(['method'=>'DELETE', 'action'=>['UserOrdersController@destroy', $order->id] ]) !!}
                                    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}

                            </div>
                        </td>
                          
                            </tr>
                        @endforeach
                    @else
                    <div class="alert alert-danger">
                        NO ORDERS YET! WHY NOT MAKE ONE. 
                        <a class="btn btn-success" href="{{ route('user_orders.create') }}"> - Make an order</a>

                    </div>
                    @endif
                </tbody>
            </table>

                <div class="col-sm-6">
                    <div class="col-sm-6 col-off-sm-5">
                        {{ $orders->render() }}
                    </div>
                </div>
            </section>
      </div>
         </div>
            <!--Reservation Activity end-->


            <!-- Chart.js -->
            <section class="panel">
              <header class="panel-heading no-border">
                Diagramatic Represenation of Data
              </header>     
                     <canvas id="myChart" ></canvas>                
            </section>   
</div>
</section>







<!-- External Script for Chart.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script> 
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Orders", "Reservations", "Contacts", "Testimonies"],
        datasets: [{
            label: '# of CMS',
            data: [{{ count($orders) }},  {{ count($reservations) }},  {{ count($contacts) }}, {{ count($testimonies) }}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

</script>








@endsection