@extends('layouts/user.base')

@section('content')

<main class="mt-5 pt-4" style="min-height: 100vh;">
  <div class="container wow fadeIn">
  	<h2 class="my-5 h2 text-center">Riwayat Pesanan Anda</h2>

    <!--Grid row-->
    
    <div class="row">

      <table class="table text-center">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Pesanan</th>
            <th>Tanggal</th>
            <th>Sub Total</th>
            <th>Status</th>
            <th>Status Pembayaran</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        	<?php $no = 1; ?>
        	@foreach($pesanan as $pesanans)
        	<tr>
        		<td>{{ $no++ }}</td>
        		<td>{{ $pesanans->kode_pesanan }}</td>
        		<td>{{ $pesanans->tanggal_pesanan }}</td>
        		<td>Rp. {{ number_format($pesanans->Subtotal_harga) }}</td>
        		<td>
        			@if($pesanans->status == 1)
        				<small class="badge orange">Proses</small>
        			@elseif($pesanans->status == 2)
        				<small class="badge blue">Belum Bayar</small>
        			@elseif($pesanans->status == 3)
        				<small class="badge yellow">Proses Pengiriman</small>
        			@elseif($pesanans->status == 4)
        				<small class="badge green">Sudah Diterima</small>
              @elseif($pesanans->status == 5)
                <small class="badge red">Pesanan Gagal</small>
              @endif
        		</td>
            <td>
              @if($pesanans->transaction_status)
                {{ $pesanans->transaction_status }}
              @endif
            </td>
        		<td>
              @if($pesanans->status == 1)
                <a href="{{ url('user/pilihKurir/'.$pesanans->id) }}" class="btn btn-warning btn-sm">Pilih Pengiriman</a>
              @elseif($pesanans->status == 2)

                @if(isset($pesanans->transaction_status) == NULL)
                <a href="{{ url('user/bayar/'.$pesanans->id) }}" class="btn btn-primary btn-sm">Pilih Pembayaran</a>
                @elseif(isset($pesanans->transaction_status) == 'pending')
                <a href="{{ url('user/kode_bayar/'.$pesanans->id) }}" class="btn btn-warning btn-sm">Lihat Kode Pembayaran</a>
                @else
                <a href="{{ url('') }}" class="btn btn-success btn-sm">Transaksi Selesai</a>
                @endif

              @elseif($pesanans->status == 3)
                <a href="{{ url('user/konfirmasi/'.$pesanans->id) }}" class="btn btn-success btn-sm">Konfirmasi Diterima</a>
              @endif              
        			<a href="{{ url('user/detail_pesanan/'.$pesanans->id) }}" class="btn btn-info btn-sm">Detail</a>

              <a href="{{ url('user/invoice/'.$pesanans->id) }}" target="_blank" class="btn btn-success btn-sm">Invoice</a>
        		</td>
        	</tr>
        	@endforeach
        </tbody>
      </table>

    </div>

  </div>
</main>

@include('sweetalert::alert')

@endsection