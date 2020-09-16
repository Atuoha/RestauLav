
    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimonials</h2>
          <p>What they're saying about us</p>
        </div>

        <div class="owl-carousel testimonials-carousel" data-aos="zoom-in" data-aos-delay="100">

          @if(count($testimonies) > 0)
              @foreach($testimonies as $testimony)

                    <div class="testimonial-item">
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        {{ strip_tags($testimony->message) }} 
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                  <img src="{{ $testimony->photo->name}}" class="testimonial-img" alt="">
                  <h3>{{ $testimony->user->name }} </h3>
                  <h4>{{ $testimony->job_title }} </h4>
                </div>

              @endforeach
          @else
              <div class="alert alert-success">No Testimonies Yet!</div>
          @endif
          
        </div>

      </div>
    </section><!-- End Testimonials Section -->
