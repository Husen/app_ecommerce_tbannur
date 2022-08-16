@extends('layouts/admin.base')

@section('title', 'Kelola Produk')

@section('content')

<!--begin: Datatable-->
<table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
	<thead>
		<tr>
			<th>No</th>
			<th>Gambar Produk</th>
			<th>Nama Produk</th>
			<th>Merk</th>
			<th>Kategori</th>
			<th>Stok</th>
			<th>Berat</th>
			<th>Harga</th>
			<th>Jenis Produk</th>
			<th>Tanggal</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php $no=1; ?>
  	@foreach($data as $produk)
	    <tr>
	      <th>{{ $no++ }}</th>
	      <td>
	      	<img src="{{ asset('img/produk/'.$produk->gambar_produk) }}" width="80px">
	      </td>
	      <td>{{ $produk->nama_produk }}</td>
	      <td>{{ $produk->merk }}</td>
	      <td>{{ $produk->kategori->nama_kategori }}</td>
	      <td>{{ $produk->stok }}</td>
	      <td>{{ $produk->berat }} gram</td>
	      <td>Rp. {{ number_format($produk->harga) }}</td>
	      <td>
	      	@if($produk->jenis_produk == 0)
	      		Pengiriman Khusus Cianjur
	      	@else
	      		Pengiriman Semua Daerah
	      	@endif
	      </td>
	      <td>{{ $produk->created_at }}</td>
	      <td nowrap="nowrap">
			<a href="#" class="btn btn-info">Detail</a>
	      	<a href="#" class="btn btn-warning ubah" data-toggle="modal" data-target="#ubahProduk{{ $produk->id }}">Ubah</a>
	      	<a href="#" class="btn btn-danger delete" data-toggle="modal" data-target="#hapusProduk{{ $produk->id }}">Hapus</a>
	      </td>
	    </tr>
    @endforeach
	</tbody>
</table>
<!--end: Datatable-->



	<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-bs-target="#tambahProduk">Tambah</button> -->
	<a href="#" class="btn btn-block btn-primary font-weight-bold text-uppercase py-4 px-6 text-center" data-toggle="modal" data-target="#tambah">Tambah</a>
	

	<!-- Modal -->
	<div class="modal modal-sticky modal-sticky-lg modal-sticky-bottom-center" id="tambah" role="dialog" data-backdrop="false">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Tambah Data Produk</h5>
	        <button class="btn btn-clean btn-sm btn-icon" data-dismiss="modal"><i class="ki ki-close icon-1x"></i></button>
	      </div>
	      <div class="modal-body">

	        <form action="/tambah_produk" method="POST" enctype="multipart/form-data">
	        	@csrf
			    <div class="mb-3">
			      <label class="form-label">Nama Produk</label>
			      <input type="text" name="nama_produk" class="form-control" required>
			    </div>

			    <div class="mb-3">
			      <label class="form-label">Merk</label>
			      <input type="text" name="merk" class="form-control" required>
			    </div>

			    <div class="mb-3">
			      <label class="form-label">Jenis Produk</label>
			      <select class="form-control" name="jenis_produk" required>
			      	<option value="">--Pilih Jenis Produk--</option>
			      	<option value="0">Pengiriman Khusus Cianjur</option>
			      	<option value="1">Pengiriman Semua Daerah</option>
			      </select>
			    </div>

			    <div class="mb-3">
			      <label class="form-label">Stok</label>
			      <input type="number" name="stok" class="form-control" required>
			    </div>

			    <div class="mb-3">
			      <label class="form-label">Kategori Produk</label>
			      <select name="kategori_id" class="form-control" required>
			      	<option>-- Pilih Kategori --</option>
			      	@foreach($kategori as $kategoris)
			      		<option value="{{ $kategoris->id }}">{{ $kategoris->nama_kategori }}</option>
			      	@endforeach
			      </select>
			    </div>

			    <div class="mb-3">
			      <label class="form-label">Berat</label>
			      <input type="number" name="berat" class="form-control" required>
			    </div>

			    <div class="mb-3">
			      <label class="form-label">Harga</label>
			      <input type="number" name="harga" class="form-control" required>
			    </div>

			    <div class="mb-3">
			      <label class="form-label">Potongan Harga</label>
			      <input type="number" name="potongan_harga" value="0" class="form-control" required>
			    </div>

			    <div class="mb-3">
			      <label class="form-label">Deskripsi</label>
			      <textarea class="form-control" name="deskripsi_produk"></textarea>
			    </div>

			    <div class="mb-3">
			      <label class="form-label">Gambar Produk</label>
			      <input type="file" name="gambar_produk" class="form-control" >
			    </div>

	      </div>
	      <div class="modal-footer">
	        <button class="btn btn-clean btn-secondary" data-dismiss="modal">Batal</button>
	        <button type="submit" class="btn btn-primary">Simpan</button>
	      </div>

	      </form>
	    </div>
	  </div>
	</div>


	<!-- Modal -->
	@foreach($data as $produk)
	<div class="modal modal-sticky modal-sticky-lg modal-sticky-bottom-center" id="hapusProduk{{ $produk->id }}" role="dialog" data-backdrop="false">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Hapus Data Produk</h5>
	        <button class="btn btn-clean btn-sm btn-icon" data-dismiss="modal"><i class="ki ki-close icon-1x"></i></button>
	      </div>
	      <div class="modal-body">

	        <form action="/hapus_produk/{{ $produk->id }}" method="POST">
	        	@csrf
			    <div class="mb-3">
			    	<label>Yakin Hapus Data?</label>
			      <input type="hidden" name="id" value="{{ $produk->id }}" class="form-control" >
			    </div>

	      </div>
	      <div class="modal-footer">
	        <button class="btn btn-clean btn-secondary" data-dismiss="modal">Batal</button>
	        <button type="submit" class="btn btn-danger">Hapus</button>
	      </div>

	      </form>
	    </div>
	  </div>
	</div>
	@endforeach


@include('sweetalert::alert')


@endsection