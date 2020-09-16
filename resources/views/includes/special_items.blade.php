<!-- ======= Specials Section ======= -->
<section id="specials" class="specials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Specials</h2>
          <p>Check Our Specials</p>
        </div>
    @if(count($special_dishes) > 0)
        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">

              @foreach($special_dishes as $special_dish_name)
              <li class="nav-item">
                <a class="nav-link  " data-toggle="tab" href="#tab-{{ $special_dish_name->id }}">{{ $special_dish_name->name }}</a>
              </li>
              @endforeach
         

            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">

            @foreach($special_dishes as $special_dish)
              <div class="tab-pane" id="tab-{{ $special_dish->id }}">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3><a href="{{ route('single', $special_dish->slug) }}">{{ $special_dish->name }}</a></h3>
                    
                    <p class="font-italic">Category: {{ $special_dish->category->name }}</p>
                    <p>{{ trim(html_entity_decode(strip_tags(Str::limit($special_dish->content, 150)))) }}</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="{{ $special_dish->photo->name }}" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            @endforeach  
             
            </div>
          </div>
        </div>

        @else
            <div class="alert alert-success">No Special Dishes Yet!</div>
        @endif

      </div>
    </section><!-- End Specials Section -->

