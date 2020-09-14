<!-- ======= Menu Section ======= -->
<section id="menu" class="menu section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Menu</h2>
          <p>Check Our Tasty Menu</p>
        </div>

        @if(count($categories) > 0)
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="menu-flters">
                
              <li data-filter="*" class="filter-active">All</li>
                @foreach($categories as $category)
                <li data-filter=".filter-{{$category->name}}">{{$category->name}}</li>
                @endforeach
                
              </ul>
            </div>
          </div>

          <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">

              @foreach($dishes as $dish)
                <div class="col-lg-6 menu-item filter-{{$dish->category->name}}">
                  <img src="{{$dish->photo->name}}" class="menu-img" alt="">
                  <div class="menu-content">
                    <a href="#">{{$dish->name}}</a><span>${{$dish->price}}</span>
                  </div>
                  <div class="menu-ingredients">
                    {{ Str::limit($dish->content, 20) }}
                  </div>
                </div>
            @endforeach
          </div>

        @else
            <div class="alert alert-danger">No Dishes Yet!</div>
        @endif

      </div>
    </section><!-- End Menu Section -->