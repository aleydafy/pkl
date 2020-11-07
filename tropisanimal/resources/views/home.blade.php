@extends('layouts.app')

@section('header')

<div style="background-image: url('images/home.png');">
    <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

        @include('layouts.navbar')
           
    </header>
    <section class="site-blocks-cover overflow-hidden bg-light">
        <div class="container">
        <div class="row">
            <div class="col-md-7 align-self-center text-center text-md-left">
            <div class="intro-text">
                <h1>Hewan <span class="d-md-block">Tropis di Dunia</span></h1>
                <p class="mb-4">Lorem ipsum dolor sit amet,<span class="d-block"> consectetur adipiscing elit.</p>
            </div>
            </div>
        </div>
        </div>
    </section>
</div>
@endsection

@section('content')
<section class="site-section">
    <div class="container">
        <div class="row hover-1-wrap mb-5 mb-lg-0">
          <div class="col-12">
            <div class="row">
              <div class="mb-4 mb-lg-0 col-lg-6 order-lg-2" data-aos="fade-right">
                <a href="#" class="hover-1">
                  <img src="images/1601761977.png" alt="Image" class="img-fluid">
                </a>
              </div>
              <div class="col-lg-5 mr-auto text-lg-left align-self-center order-lg-1" data-aos="fade-left">
                <h6>TENTANG KAMI</h6>
                <h2 class="text-black mb-2">{{ $profileTerbaru['judul'] }}</h2>
                <p class="mb-4">{{ $profileTerbaru['deskripsi'] }}</p>
                <p><a href="#" class="btn btn-primary">Read More</a></p>
              </div>
            </div>
          </div>
        </div>
    </div>
</section>

<section class="site-section " id="services-section">
    <div class="container">
        <div class="row justify-content-left" data-aos="fade-up">
            <div class="col-lg-6 text-left heading-section mb-5">
                <h6>BERITA</h6>
                <h2 class="text-black mb-2">Baca Berita Terbaru Kami Dalam Tropisianimal</h2>
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
        @foreach($beritaTerbaru as $row)
          <div class="col-md-6 mb-4 col-lg-4" data-aos="fade-up" data-aos-delay="">            
            <div class="block_service">
              <img src="{{ asset('images/'.$row->gambar) }}">
              <h3>{{ $row->judul }}</h3>
              <a href="#">{{ $row->konten }}</a>
            </div>
        </div>
        @endforeach
    </div>
</section>

<section class="site-section" id="gallery-section">
    <div class="container">
        <div class="row justify-content-left" data-aos="fade-up">
            <div class="col-lg-6 text-left heading-section mb-5">
                <h6>GALERI</h6>
                <h2 class="text-black mb-2">Lihat Lebih Banyak Hewan Tropis Pada Galeri Kami</h2>
            </div>
            <div class="row no-gutters">
                    @foreach($galeriTerbaru as $row)
                    <a class="col-md-6 mb-4 col-lg-4 gal-item d-block" data-aos="fade-up" data-aos-delay="100" href="{{asset('images/'.$row->gambar)}}" data-fancybox="gal"><img src="{{asset('images/'.$row->gambar)}}" alt="Image" class="img-fluid"></a>
                    @endforeach
            </div>
        </div>
    </div>
</section>
@endsection

</body>
</html>
