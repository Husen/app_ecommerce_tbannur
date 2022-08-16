@extends('layouts/admin.base')

@section('title', 'Data Pembeli')

@section('content')


<!--begin: Datatable-->
<table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pembeli</th>
			<th>Email</th>
			<th>Foto</th>
			<th>Tanggal Daftar</th>
		</tr>
	</thead>
	<tbody>
	<?php $no=1; ?>
  	@foreach($data as $user)
  	@if($user->level != 'admin')
	    <tr>
	      <th>{{ $no++ }}</th>
	      <td>{{ $user->nama_user }}</td>
	      <td>{{ $user->email }}</td>
	      <td><img src="{{ asset('img/foto_user/'.$user->foto_user) }}" width="90px"></td>
	      <td>{{ $user->created_at }}</td>
	    </tr>
	@endif
    @endforeach
	</tbody>
</table>
<!--end: Datatable-->


@endsection