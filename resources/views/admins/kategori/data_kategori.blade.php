@extends('layouts/admin.base')

@section('title', 'Kelola Kategori')

@section('content')


<!--begin: Datatable-->
<table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Kategori</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php $no=1; ?>
  	@foreach($data as $kategori)
	    <tr>
	      <th>{{ $no++ }}</th>
	      <td>{{ $kategori->nama_kategori }}</td>
	      <td>
			<a href="#" class="btn btn-warning ubah" data-toggle="modal" data-target="#ubahKategori{{ $kategori->id }}">Ubah</a>
	      	<a href="#" class="btn btn-danger delete" data-toggle="modal" data-target="#hapusKategori{{ $kategori->id }}">Hapus</a>
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
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Data Kategori</h5>
        <button class="btn btn-clean btn-sm btn-icon" data-dismiss="modal"><i class="ki ki-close icon-1x"></i></button>
      </div>
      <div class="modal-body">

        <form action="{{ url('admin/tambah_kategori') }}" method="POST" enctype="multipart/form-data">
        	@csrf
		    <div class="mb-3">
		      <label class="form-label">Nama Kategori</label>
		      <input type="text" name="nama_kategori" class="form-control" required>
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


@foreach($data as $kategori)
<div class="modal modal-sticky modal-sticky-lg modal-sticky-bottom-center" id="ubahKategori{{ $kategori->id }}" role="dialog" data-backdrop="false">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ubah Data Kategori</h5>
        <button class="btn btn-clean btn-sm btn-icon" data-dismiss="modal"><i class="ki ki-close icon-1x"></i></button>
      </div>
      <div class="modal-body">

        <form action="{{ url('admin/update_kategori') }}" method="POST" enctype="multipart/form-data">
        	@csrf
		    <input type="hidden" name="id" value="{{ $kategori->id }}" class="form-control" required>
		    <div class="mb-3">
		      <label class="form-label">Nama Kategori</label>
		      <input type="text" name="nama_kategori" value="{{ $kategori->nama_kategori }}" class="form-control" required>
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
@endforeach


@foreach($data as $kategori)
<div class="modal modal-sticky modal-sticky-lg modal-sticky-bottom-center" id="hapusKategori{{ $kategori->id }}" role="dialog" data-backdrop="false">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Data Kategori</h5>
        <button class="btn btn-clean btn-sm btn-icon" data-dismiss="modal"><i class="ki ki-close icon-1x"></i></button>
      </div>
      <div class="modal-body">

        <form action="{{ url('admin/hapus_kategori') }}" method="POST" enctype="multipart/form-data">
        	@csrf
		    <input type="hidden" name="id" value="{{ $kategori->id }}" class="form-control" required>
		    <div class="mb-3">
		    	<label>Yakin Hapus Data?</label>
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