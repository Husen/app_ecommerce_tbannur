@extends('layouts/user.base')

@section('content')

<!-- <section class="cart"> -->
    <div class="container"><br><br><br>
		<table id="tableOrder" class="table table-striped">
			<thead>
				<tr>			
					<th>No</th>
					<th>Nomor Pesanan</th>
					<th>Total Pembelian</th>
					<th>Status</th>
					<th>Invoice</th>
				</tr>
			</thead>
			<tbody>
				<tr>				
					<td>1</td>
					<td>2022Y07M23D001</td>
					<td>Rp. 90.000</td>
					<td>Telah Diterima</td>
					<td>
						<a href="#">pratinjau</a>
					</td>
				</tr>
			</tbody>
		</table>
		<br><br><br>
	</div>
<!-- </section> -->

@include('sweetalert::alert')

@endsection