
    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">

      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Gallery</h2>
          <p>Some photos from Our Restaurant</p>
        </div>
      </div>
    @if(count($photos) > 0)
      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row no-gutters">
        @foreach($photos as $photo)
          <div class="col-lg-2 col-md-4">
            <div class="gallery-item">
              <a href="{{ $photo->name }}" class="venobox" data-gall="gallery-item">
                <img src="{{ $photo->name }}" alt="" class="img-fluid">
              </a>
            </div>
          </div>
        @endforeach  

    @else
        <div class="alert alert-success">No Photos Yet!</div>
    @endif

        </div>
      </div>

      <div class="col-lg-6">
        <div class="text-center">
          {{$photos->render()}}
        </div>
      </div>
    </section><!-- End Gallery Section -->
