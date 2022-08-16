@extends('layouts/user.base')

@section('content')

    
<section class="carousel">
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="{{ asset('assets/user/img/slider/template banner.jpg') }}" class="d-block w-100" alt="Dhurat&euml; q&euml; ja Vlen!">
                <div class="carousel-caption d-none d-md-block text-white">
                    <h5>Template slide spanduk 1.</h5>
                    <!-- <p></p> -->
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="{{ asset('assets/user/img/slider/spanduk2.jpg') }}" class="d-block w-100" alt="Citizen">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Template slide spanduk 2.</h5>
                    <!-- <p></p> -->                            
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section><!-- wrapper&carousel-end ./ -->


<section class="products pm">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <article class="title text-center">
                    <p class="sub-title">Katalog Produk <i class="uil uil-list-ui-alt"></i></p>
                </article>
            </div>
        </div>
        <div class="row">

            @foreach($data as $produk)
            <div class="col-lg-4 col-md-6">
                <div class="product-item discount">
                    <div class="product-item-inner">
                        <!-- <span class="discount">-25%</span> -->
                        <a href="user/detail/{{ $produk->slug_produk }}" class="link">
                            <figure class="img-box">
                                <img src="{{ asset('img/produk/'.$produk->gambar_produk) }}" alt="">
                            </figure>
                        </a>
                        <div class="details">
                            <span class="cat"><i class="uil uil-tag-alt"></i> {{ $produk->merk }}</span>
                            <a href="./products/product-details.html" class="link">
                                <h5 class="title">{{ $produk->nama_produk }}</h5>
                            </a>
                            <div class="star" style="cursor: pointer;">
                                <h4>Rp. {{ number_format($produk->harga) }}</h4>
                            </div>
                            <form action="user/tambah_keranjang" method="POST">
                                @csrf
                                <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                                <input type="hidden" name="harga_0" value="{{ $produk->harga }}">
                                <button type="submit" class="btn btn-success">Tambah Keranjang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- products-end ./ -->
            @endforeach

        </div>

    </div>
</section><!-- products-end ./ -->


    

    @endsection