@include('includes.homenavbar')
 <section id="hero" class="section hero">

      <div class="container" style="height: 70vh;">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h1>{{__('msg.head')}}</h1>
            <p>{{__('msg.para')}}</p>
            <div class="d-flex">
              <a href="{{url('login')}}" class="btn-get-started">{{__('msg.getstart')}}</a>
              <a href="https://www.youtube.com/watch?v=wNC-5VrLXjw" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>{{__('msg.watch')}}</span></a>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img">
            <img src="assets/img/hero-img.svg" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section>
