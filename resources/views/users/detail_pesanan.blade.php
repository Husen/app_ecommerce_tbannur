@extends('layouts/user.base')

@section('content')



<main class="mt-5 pt-4" style="min-height: 100vh;">
  <div class="container wow fadeIn">

    <h2 class="my-5 h2 text-center">Pesanan Dengan Kode {{ $pesanan->order_id }}</h2>

    <!--Grid row-->
    
    <div class="row">

      <table class="table text-center">
        <thead>
          <tr>
            <th>Gambar</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
          </tr>
        </thead>
        <tbody>
          @foreach($pesanan_detail as $detail)
          <tr>
            <td>
              <img src="{{ asset('img/produk/'.$detail->produk->gambar_produk) }}" width="80px" alt="">
            </td>
            <td>{{ $detail->produk->nama_produk }}</td>
            <td>{{ $detail->produk->harga-$detail->produk->potongan_harga }}</td>
            <td>{{ $detail->jumlah }}</td>
            <td>Rp. {{ number_format($detail->total_harga) }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

      <div class="row">
      <div class="col-sm-12 text-right">
        @if($pesanan->metode_pengiriman == 'Kurirtoko')
        <h5>Pengirim Kurir Toko dengan Harga Ongkos Kirim : Rp. {{ number_format($user->kecamatan->harga_ongkir) }}</h5>
        @endif
        <h5>Sub Total Biaya + Ongkir = Rp. {{ number_format($pesanan->Subtotal_harga) }}</h5>
      </div>

    </div>

  </div>
</main>



@include('sweetalert::alert')

@endsection