@extends('layouts/user.base')

@section('content')



<main class="mt-5 pt-4" style="min-height: 100vh;">
  <div class="container wow fadeIn">

    <!-- Heading -->
    @if($bnyak == 0)
    <h2 class="my-5 h2 text-center">Keranjang Belanja Anda Kosong</h2>
    @else
    <h2 class="my-5 h2 text-center">Keranjang Belanja Anda</h2>

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
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>

          @foreach($keranjang as $keranjangs)
          <tr >
            <td>
              <a href="{{ url('detail_produk/'.$keranjangs->produk->slug_produk) }}">
                <img src="{{ asset('img/produk/'.$keranjangs->produk->gambar_produk) }}" width="80px" alt="">
              </a>
            </td>
            <td>
              <a href="{{ url('detail_produk/'.$keranjangs->produk->slug_produk) }}">
                {{ $keranjangs->produk->nama_produk }}
              </a>
            </td>
            <td>
              @if($keranjangs->produk->potongan_harga != 0)
              (<del>
                Rp. {{ number_format($keranjangs->produk->harga) }}
              </del>)
              Rp. {{ number_format($keranjangs->produk->harga-$keranjangs->produk->potongan_harga) }}
              @else
              Rp. {{ number_format($keranjangs->produk->harga-$keranjangs->produk->potongan_harga) }}
              @endif
            </td>              
            <td>
              <form action="{{ url('user/update_keranjang') }}" method="POST">
              @csrf
              <input type="hidden" name="produk_id" value="{{ $keranjangs->produk_id }}">
              <input type="number" name="jumlah_pesan" value="{{ $keranjangs->jumlah }}" min="1" max="{{ $keranjangs->produk->stok }}" style="width: 60px">
            </td>
            <td>
              Rp. {{ number_format($keranjangs->total_harga) }}
            </td>
            <td>
              <button type="submit" class="btn btn-warning btn-sm">Update</button>
              <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusKeranjangs{{ $keranjangs->id }}">Hapus</a>
              <button class="btn btn-sm btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                Detail
              </button>
              <div class="dropdown-menu">
                <span class="dropdown-item">Stok : {{ $keranjangs->produk->stok }}</span>
                <span class="dropdown-item">Merk : {{ $keranjangs->produk->merk }}</span>
                <span class="dropdown-item">Berat : {{ $keranjangs->produk->berat }} Gram</span>
              </div>
            </td>
          </form>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="row">
      <div class="col-sm-12 text-right">
        <h5>Total Berat : {{ $pesanan->Subtotal_berat }} gram</h5>
        <h3>Sub Total : Rp. {{ number_format($pesanan->Subtotal_harga) }}</h3>
        <a href="{{ url('user/cekout') }}" class="btn btn-primary btn-block" onclick="return confirm('Anda yakin akan Check Out ?');">Check Out
        </a>
      </div>

    </div>
    @endif

  </div>
</main>

<!-- Modal -->
  @foreach($keranjang as $keranjangs)
  <div class="modal modal-sticky modal-sticky-lg modal-sticky-bottom-center" id="hapusKeranjangs{{ $keranjangs->id }}" role="dialog" data-backdrop="false">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahProduk">Hapus Keranjangs</h5>
          <button class="btn btn-clean btn-sm btn-icon" data-dismiss="modal"><i class="ki ki-close icon-1x"></i></button>
        </div>
        <div class="modal-body">

          <form action="{{ url('user/hapus_keranjang') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label>Yakin Hapus Data?</label>
            <input type="hidden" name="id" value="{{ $keranjangs->id }}" class="form-control" >
          </div>

        </div>
        <div class="modal-footer">
          <button class="btn btn-clean btn-sm" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
        </div>

        </form>
      </div>
    </div>
  </div>
  @endforeach

@include('sweetalert::alert')

@endsection