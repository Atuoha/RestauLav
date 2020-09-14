
    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Reservation</h2>
          <p>Book a Table</p>

@if(session('RESERVATION_CREATE'))
    <div class="alert alert-success">{{ session('RESERVATION_CREATE') }}</div>
@endif

        </div>
  @if(Auth::check())
      {!! Form::open(['method'=>'POST', 'action'=>'UserReservationController@store',  'data-aos'=>'fade-up', 'data-aos'=>'100']) !!}
        <div class="form-row">

          <div class="col-lg-6 col-md-6 form-group">
            {!! Form::text('contact', null, ['class'=>'form-control', 'placeholder'=>'Contact Number']) !!}

            @error('contact')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-lg-6 col-md-6 form-group">
            {!! Form::text('date', null, ['class'=>'form-control', 'placeholder'=>'Date']) !!}

            @error('date')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-lg-6 col-md-6 form-group">
            {!! Form::text('time', null, ['class'=>'form-control', 'placeholder'=>'Time']) !!}

            @error('time')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-lg-6 col-md-6 form-group">
            {!! Form::select('table_number', ['Table for 2'=>'Table For 2', 'Table for 4'=>'Table for 4', 'Table for 6'=>'Table for 6', 'Table for 8'=>'Table for 8', 'Table for 10'=>'Table for 10', 'Table for 12'=>'Table for 12'], null, ['class'=>'form-control', 'placeholder'=>'# of People']) !!}

            @error('table_number')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

        </div>

        <div class="form-group">
          {!! Form::textarea('message',null, ['class'=>'form-control','rows'=>3, 'placeholder'=>'Message']) !!}

        @error('message')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="text-center">{!! Form::submit('Book a Table', ['class'=>'btn btn-warning']) !!}</div>


      {!! Form::close() !!}
      </div>
  @else
    <div class="alert alert-danger">Login to Book Now!</div>
  @endif
          
  </section><!-- End Book A Table Section -->

