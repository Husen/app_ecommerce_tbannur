@extends('layouts/admin.base')

@section('title', 'Kelola Pesanan Masuk')

@section('content')


<!--begin: Datatable-->
<table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pembeli</th>
			<th>Email</th>
			<th>Tanggal</th>
			<th>Kode Pesanan</th>
			<th>Alamat</th>
			<th>Kurir</th>
			<th>Total Pembayaran</th>
			<!-- <th>Metode Pembayaran</th> -->
			<th>Status Pembayaran</th>
			<th>No Resi</th>
			<th>Status Pesanan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php $no=1; ?>
  	@foreach($data as $pesanan)
	    <tr>
	      <th>{{ $no++ }}</th>
	      <td>{{ $pesanan->user->nama_user }}</td>
	      <td>{{ $pesanan->user->email }}</td>
	      <td>{{ $pesanan->tanggal_pesanan }}</td>
	      <td>{{ $pesanan->kode_pesanan }}</td>
	      <td>Prov. {{ $pesanan->user->provinsi_nama }}, Kab. {{ $pesanan->user->kota_nama }}, Kec. {{ $pesanan->user->kecamatan_nama }}, Desa {{ $pesanan->user->desa }}</td>
	      <td>{{ $pesanan->metode_pengiriman }}</td>
	      <td>Rp. {{ number_format($pesanan->Subtotal_harga) }}</td>
	      <td>{{ $pesanan->transaction_status }}</td>
	      <td>
	      	@if($pesanan->transaction_status == 'settlement')
	      	<form action="{{ url('admin/no_resi') }}" method="POST">
	      		@csrf
	      		<input type="hidden" name="id_pesanan" value="{{ $pesanan->id }}">
	      		<input type="text" name="no_resi" value="{{ $pesanan->no_resi }}" style="width:200px">
	      	</form>
	      	@endif
	      </td>
	      <td>Sedang Dikirim</td>
	      <td nowrap="nowrap">
			<a href="#" class="btn btn-primary">Detail</a>
	      	<a href="{{ url('admin/invoice/'.$pesanan->id) }}" target="_blank" class="btn btn-success">Invoice</a>
	      </td>
	    </tr>
    @endforeach
	</tbody>
</table>
<!--end: Datatable-->

@endsection