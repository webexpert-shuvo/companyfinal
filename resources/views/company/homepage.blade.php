@extends('company.layouts.app')
@section('company-content')
<x-Hero />
<main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</strong></h2>
        </div>

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-right">
            <h2>{{ $homeaboutdata  -> name }}</h2>
            <h3>{{ $homeaboutdata  -> shortcontent }}</h3>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
            {!! htmlspecialchars_decode($homeaboutdata  -> logcontent) !!}
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</strong></h2>
          <p>Laborum repudiandae omnis voluptatum consequatur mollitia ea est voluptas ut</p>
        </div>

        <div class="row">

            @foreach ($homeservices as $services)
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box iconbox-blue">
                    <div class="icon">
                        <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
                        </svg>
                        <i class="{{ $services -> iconname }}"></i>
                    </div>
                    <h4><a href="">{{ $services -> name }}</a></h4>
                    <p>{{ $services -> shortcontent }}</p>
                    </div>
                </div>
            @endforeach





        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Portfolio</h2>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up">

            @foreach ($homegallery -> image as $gallery)
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <img src="{{ URL::to('') }}/backend/assets/img/gallery/{{ $gallery  -> imagename }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                    <h4>{{ $homegallery -> name }}</h4>
                    <p>{{ $homegallery -> name }}</p>
                    <a href="{{ URL::to('') }}/backend/assets/img/gallery/{{ $gallery  -> imagename }}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>
            @endforeach




        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Our Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Clients</h2>
        </div>

        <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">

            @foreach ($homeclients as $client)
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="client-logo">
                    <img src="{{ URl::to('') }}/backend/assets/img/client/{{ $client -> image -> imagename }}" class="img-fluid" alt="">
                    </div>
                </div>
            @endforeach
        </div>

      </div>
    </section><!-- End Our Clients Section -->

  </main>
@endsection

