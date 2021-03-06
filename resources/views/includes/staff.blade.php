
    <!-- ======= Chefs Section ======= -->
    <section id="chefs" class="chefs">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Chefs</h2>
          <p>Our Proffesional Chefs</p>
        </div>

        <div class="row">


        @if(count($staffs) > 0)
            @foreach($staffs as $staff)

            <div class="col-lg-4 col-md-6">
              <div class="member" data-aos="zoom-in" data-aos-delay="100">
                <img src="{{ $staff->photo->name }}" class="img-fluid" alt="">
                <div class="member-info">
                  <div class="member-info-content">
                    <h4>{{ $staff->name }}</h4>
                    <span>{{ $staff->job_title }}</span>
                  </div>
                  <div class="social">
                    <a href=""><i class="icofont-twitter"></i></a>
                    <a href=""><i class="icofont-facebook"></i></a>
                    <a href=""><i class="icofont-instagram"></i></a>
                    <a href=""><i class="icofont-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>

           @endforeach

        @else
            <div class="alert success">No Staffs Yet!</div>
        @endif

        </div>

      </div>
    </section><!-- End Chefs Section -->

