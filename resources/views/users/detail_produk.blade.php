@extends('layouts/user.base')

@section('content')


<!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container dark-grey-text mt-5">

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-6 mb-4 text-center">

          <img src="{{ asset('img/produk/'.$produk->gambar_produk) }}" width="350px" class="img-fluid" alt="">

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <!--Content-->
          <div class="p-4">

            <div class="mb-3">
              <a href="#">
                <span class="badge purple mr-1">Kategori:{{ $produk->kategori->nama_kategori }}</span>
              </a>
              <a href="#">
                <span class="badge blue mr-1">Merk{{ $produk->merk }}</span>
              </a>
              <a href="#">
                <span class="badge red mr-1">Berat:{{ $produk->berat }} Gram</span>
              </a>
              <a href="#">
                @if($produk->stok < 5)
                <span class="badge red mr-1">Stok:{{ $produk->stok }}</span>
                @else
                <span class="badge green mr-1">Stok:{{ $produk->stok }}</span>
                @endif
              </a>
            </div>

            <p class="lead">
              @if($produk->potongan_harga != 0)
              <span class="mr-1">
                <del>Rp. {{ number_format($produk->harga) }}</del>
              </span>
              @endif
              <span>Rp. {{ number_format($produk->harga-$produk->potongan_harga) }}</span><br>
              <span class="badge green mr-1">Dikirim Dari Prov. Jawa Barat Kab. Cianjur Desa Bojongpicung</span>
              @if($produk->jenis_produk == 1)
              	<span class="badge orange mr-1">Untuk Semua Wiliyah Indonesia</span>
              @else
              	<span class="badge orange mr-1">Khusus Jawa Barat Kab. Cianjur</span>
              @endif              
            </p>

            <p class="lead font-weight-bold">{{ $produk->nama_produk }}</p>

            <p>{{ $produk->deskripsi_produk }}</p>

            <form class="d-flex justify-content-left" action="{{ url('user/tambah_keranjang') }}" method="POST">
              @csrf
              <input type="hidden" name="produk_id" value="{{ $produk->id }}">
              <input type="number" name="jumlah_pesan" value="1" class="form-control" style="width: 100px" min="1" max="{{ $produk->stok }}">
              <button class="btn btn-success btn-md my-0 p" type="submit">Tambah Keranjang
                <i class="fas fa-shopping-cart ml-1"></i>
              </button>

            </form>

          </div>
          <!--Content-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <hr>

      <!--Grid row-->
      <div class="row d-flex justify-content-center wow fadeIn">

        <!--Grid column-->
        <div class="col-md-6 text-center">

          <h4 class="my-4 h4">Produk Kategori: {{ $produk->kategori->nama_kategori }}</h4>

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <!--Grid row-->
      <div class="row wow fadeIn">

      	@foreach($produk_kategori as $produks)
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
                <span>
                  <strong>
                    <a href="" class="dark-grey-text">{{ $produks->nama_produk }}</a>
                  </strong>
                </span>

                <h4 class="font-weight-bold blue-text">
                  <strong>Rp. {{ number_format($produks->harga) }}</strong>
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

    </div>
  </main>
  <!--Main layout-->


@include('sweetalert::alert')

@endsection