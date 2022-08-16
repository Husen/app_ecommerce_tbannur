@extends('layouts/user.base')

@section('content')


  <!--Carousel Wrapper-->
  <div id="carousel-example-1z" class="carousel slide carousel-fade pt-4" data-ride="carousel">

    <!--Indicators-->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-1z" data-slide-to="1"></li>
    </ol>
    <!--/.Indicators-->

    <!--Slides-->
    <div class="carousel-inner" role="listbox">

      <!--First slide-->
      <div class="carousel-item active">
          <div class="view" style="background-image: url('<?= asset('img/Spanduk Toko Bangunan.jpg') ?>'); background-repeat: no-repeat; background-size: cover;">

            <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">

              <!-- Content -->
              <div class="text-center white-text mx-5 wow fadeIn">
                <h1 class="mb-4">
                  <strong>Toko Bangunan An-Nur</strong>
                </h1>

                <p>
                  <strong>Jl. Bojongpicung Desa Bojong Picung</strong>
                </p>

                <p class="mb-4 d-none d-md-block">
                  <strong>Toko kami adalah solusi bagi orang-orang yang ingin melakukan belanja mudah dengan cara online, kami menyediakan banyak produk alat bahan bangunan, material serta produk mebel. Khususnya warga cianjur dapat melakukan pemesanan bahan bangunan yang terbilang berat dalam pengiriman, kami menyediakan pengiriman khusus dari kurir toko. Selamat berbelanja :)</strong>
                </p>

                <a href="#produk" class="btn btn-outline-white btn-lg">Belanja Disini
                  <i class="fas fa-shopping-bag"></i>
                </a>
              </div>
              <!-- Content -->

            </div>
          <!-- Mask & flexbox options-->

        </div>
      </div>
      <!--/First slide-->

      <!--Second slide-->
      <div class="carousel-item">
          <div class="view" style="background-image: url('<?= asset('img/Spanduk Toko Bangunan1.jpg') ?>'); background-repeat: no-repeat; background-size: cover;">

            <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">

              <!-- Content -->
              <div class="text-center white-text mx-5 wow fadeIn">
                <h1 class="mb-4">
                  <strong>Toko Bangunan An-Nur</strong>
                </h1>

                <p>
                  <strong>Jl. Bojongpicung Desa Bojong Picung</strong>
                </p>

                <p class="mb-4 d-none d-md-block">
                  <strong>Toko kami adalah solusi bagi orang-orang yang ingin melakukan belanja mudah dengan cara online, kami menyediakan banyak produk alat bahan bangunan, material serta produk mebel. Khususnya warga cianjur dapat melakukan pemesanan bahan bangunan yang terbilang berat dalam pengiriman, kami menyediakan pengiriman khusus dari kurir toko. Selamat berbelanja :)</strong>
                </p>

                <a href="#produk" class="btn btn-outline-white btn-lg">Belanja Disini
                  <i class="fas fa-shopping-bag"></i>
                </a>
              </div>
              <!-- Content -->

            </div>
          <!-- Mask & flexbox options-->

        </div>
      </div>
      <!--/Second slide-->
    </div>
    <!--/.Slides-->

    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->

  </div>
  <!--/.Carousel Wrapper-->

  <!--Main layout-->
  <main>
    <div class="container" id="produk">

      <!--Navbar-->
      <nav class="navbar navbar-expand-lg navbar-dark mdb-color lighten-3 mt-3 mb-5">

        <!-- Navbar brand -->
        <span class="navbar-brand">Kategori:</span>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
          aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="basicExampleNav">

          <!-- Links -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">All
                <span class="sr-only">(current)</span>
              </a>
            </li>
            @foreach($kategori as $kategoris)

            <li class="nav-item">
              <a class="nav-link" href="{{ url('kategori/'.$kategoris->slug_kategori) }}">{{ $kategoris->nama_kategori }}</a>
            </li>            
            @endforeach
          </ul>
          <!-- Links -->

          <form class="form-inline" action="/" method="GET">
            <div class="md-form my-0">
              <input class="form-control mr-sm-2" name="search" type="search" placeholder="Cari Produk..." aria-label="Search">
            </div>
          </form>
        </div>
        <!-- Collapsible content -->

      </nav>
      <!--/.Navbar-->

      <!--Section: Products v.3-->
      <section class="text-center mb-4">

        <!--Grid row-->
        <div class="row wow fadeIn">

          @foreach($produk as $produks)
          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4">

            <!--Card-->
            <div class="card">

              <!--Card image-->
              <div class="view overlay">
                <a href="{{ url('detail_produk/'.$produks->slug_produk) }}">
                <img src="{{ asset('img/produk/'.$produks->gambar_produk) }}" width="150px" height="220px" class="card-img-top"
                  alt="">
                
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>
              <!--Card image-->

              <!--Card content-->
              <div class="card-body text-center">
                <!--Category & Title-->
                <!-- <a href="" class="grey-text">
                  <h5>{{ $produks->kategori->nama_kategori }}</h5>
                </a> -->
                <span>
                  <strong>
                    <a href="{{ url('detail_produk/'.$produks->slug_produk) }}" class="dark-grey-text">{{ $produks->nama_produk }}</a>
                  </strong>
                </span>
                @if($produks->potongan_harga != 0)
                <br>
                <span>
                  <del>Rp. {{ number_format($produks->harga) }}</del>
                </span>
                @endif
                <h4 class="font-weight-bold blue-text">
                  <strong>Rp. {{ number_format($produks->harga-$produks->potongan_harga) }}</strong>
                </h4>
                <div class="dropdown">
                  <button class="btn btn-sm btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                    Detail
                  </button>
                  <div class="dropdown-menu">
                    <span class="dropdown-item">Stok : {{ $produks->stok }}</span>
                    <span class="dropdown-item">Merk : {{ $produks->merk }}</span>
                    <span class="dropdown-item">Kategori : {{ $produks->kategori->nama_kategori }} </span>
                  </div>
                </div>
                <form action="{{ url('user/tambah_keranjang') }}" method="POST">
                    @csrf
                    <input type="hidden" name="produk_id" value="{{ $produks->id }}">
                    <input type="hidden" name="jumlah_pesan" value="1">
                    <button type="submit" class="btn btn-sm btn-success">Tambah Keranjang
                      <i class="fas fa-shopping-cart ml-1"></i>
                    </button>
                </form>

              </div>
              <!--Card content-->

            </div>
            <!--Card-->

          </div>
          <!--Grid column-->
          @endforeach

        </div>
        <!--Grid row-->

      </section>
      <!--Section: Products v.3-->


      <!--Pagination-->
      <nav class="d-flex justify-content-center wow fadeIn">        
        {{ $produk->links() }}
      </nav>
      <!--Pagination-->

    </div>
  </main>
  <!--Main layout-->

@include('sweetalert::alert')

@endsection