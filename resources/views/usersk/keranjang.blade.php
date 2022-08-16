@extends('layouts/user.base')

@section('content')


<section class="cart">
    <div class="container">
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>Hapus</td>
                        <td>Gambar</td>
                        <td>Nama Produk</td>
                        <td>Harga</td>
                        <td>Jumlah</td>
                        <td>Total</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                	@foreach($data as $keranjang)
                    <tr>
                        <td><a href="#"><i class="uil uil-times-circle"></i></a></td>
                        <td>
                            <img src="{{ asset('img/produk/'.$keranjang->produk->gambar_produk) }}" alt="">
                        </td>
                        <td>{{ $keranjang->produk->nama_produk }}</td>
                        <td>{{ $keranjang->produk->harga }}</td>                        
                        <form action="{{ url('user/update_keranjang') }}" method="POST">
                        @csrf
                        <input type="hidden" name="produk_id" value="{{ $keranjang->produk_id }}">
                        <input type="hidden" name="harga" value="{{ $keranjang->produk->harga }}">
                        <td><input type="number" name="jumlah_upd" value="{{ $keranjang->jumlah }}" min="1" max="10" /></td>
                        <td>{{ $keranjang->total_harga }}</td>
                        <td>
                        	<button type="submit" class="btn btn-warning btn-sm">Update</button>
                        </td>
                    	</form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>


<section class="cart-add">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6 cupon">
                <h3>Gunakan Kupon</h3>
                <div>
                    <input type="text" placeholder="Masukan kupon yang aktif..!" disabled />
                    <button class="btn-normal">Apply</button>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 subtotal">
                <h3>Total Keranjang Belanja</h3>
                <form>
	                <table class="table table-striped">
	                    <tr>
	                        <td>Subtotal Belanja</td>
	                        <td>{{ $jumlahs }}</td>
	                    </tr>
	                </table>
	                <button type="submit" class="btn-normal">Checkout</button>
            	</form>
            </div>
        </div>
    </div>
</section>


@include('sweetalert::alert')

@endsection