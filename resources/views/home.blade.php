@extends('template')
@section('content')
<div class="slide-one-item home-slider owl-carousel">
@foreach($slider as $s)
    <div class="site-blocks-cover overlay" style="background-image: url('{{$s->slider_image}}');" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">


                    <h1 class="text-white font-weight-light">{{$s->slider_name}}</h1>
                    <p class="mb-5">{{$s->slider_text}}</p>

                </div>
            </div>
        </div>
    </div>
@endforeach
</div>


<div class="site-section">

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center">
                <h2 class="font-weight-light text-black">Unit Rental</h2>
                <p class="color-black-opacity-5">Silahkan Pilih Unit yang akan di rental</p>
            </div>
        </div>
        <div class="row">
          @foreach ($produk as $p)
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                <a href="/pesan/{{$p->id}}" class="unit-1 text-center">
                    <img src="{{url($p->produk_images)}}" alt="Image" class="img-fluid">
                    <div class="unit-1-text">
                        <h3 class="unit-1-heading">{{$p->namaMobil}}</h3>
                        <strong class="text-primary mb-2 d-block">
                          <?php
                          $harga="Rp. ".number_format($p->harga,2,',','.');
                          echo $harga;
                          ?>
                        </strong>
                        <h3 class="unit-1-heading">Kapasitas {{$p->kapasitas}} Orang</h3>
                        <h3 class="unit-1-heading">Bahan Bakar {{$p->bb}}</h3>
                    </div>
                </a>
            </div>
          @endforeach
        </div>
    </div>

</div>
@endsection
