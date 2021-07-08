@extends('company.layouts.app')
@section('company-content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Blog</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Blog</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">

          <div class="col-lg-8 entries">

            @foreach ($posts as $post)
                <article class="entry" data-aos="fade-up">

                    <div class="entry-img">
                    <img src="{{ URL::to('') }}/backend/assets/img/post/{{ $post -> image -> imagename }}" alt="" class="img-fluid">
                    </div>

                    <h2 class="entry-title">
                    <a href="">{{ $post -> name }}</a>
                    </h2>

                    <div class="entry-meta">
                    <ul>
                        <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="blog-single.html">{{ $post -> user -> name }}</a></li>
                        <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">{{ date('d M Y' , strtotime($post -> created_at)) }}</time></a></li>
                        <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="blog-single.html">12 Comments</a></li>
                    </ul>
                    </div>

                    <div class="entry-content">
                    {!!  Str::of(htmlspecialchars_decode($post -> logcontent )) -> words(30)     !!}
                    <div class="read-more">
                        <a href="blog-single.html">Read More</a>
                    </div>
                    </div>

                </article>
            @endforeach







            <div class="blog-pagination">
              <ul class="justify-content-center">
                <li class="disabled"><i class="icofont-rounded-left"></i></li>
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
              </ul>
            </div>



          </div><!-- End blog entries list -->

          {{-- show sliderbar form component --}}

          <x-Blogsidebar/>


          <!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main>

@endsection

