
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>
      </div>


      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p>A108 Coding Street, Port Harcourt, Nigeria</p>
              </div>

              <div class="open-hours">
                <i class="icofont-clock-time icofont-rotate-90"></i>
                <h4>Open Hours:</h4>
                <p>
                  Monday-Saturday:<br>
                  11:00 AM - 2300 PM
                </p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>info@restaulav.com</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p>+234 000 000 0000</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

          
      @if(Auth::check())

              @if(session('CONTACT_CREATE'))
                <div class="alert alert-success">{{ session('CONTACT_CREATE') }}</div>
              @endif

            {!! Form::open(['method'=>'POST', 'action'=>'UserContactController@store', 'class'=>'php-email-form']) !!}
   
              <div class="form-group">
                {!! Form::text('subject', null, ['class'=>'form-control', 'placeholder'=>'subject','data-msg'=>'Please fill the subject field', 'required']) !!}

                @error('subject')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                {!! Form::textarea('message', null, ['class'=>'form-control', 'rows'=>8, 'data-msg'=>'Please fill the message field', 'required']) !!}
              </div>
             
              <div class="text-center">{!! Form::submit('Submit Request', ['class'=>'btn']) !!}</div>
            {!! Form::close() !!}

          </div>

      @else
        
      <div class="alert alert-success">Login to contact us</div>

      @endif

        </div>

      </div>
    </section><!-- End Contact Section -->

