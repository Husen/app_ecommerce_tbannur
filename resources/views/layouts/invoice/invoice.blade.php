

<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->
<head>
	<meta charset="utf-8" />
	<title>Tb-Annur</title>
	<meta name="description" content="Pagination options datatables examples" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<!-- <link rel="canonical" href="https://keenthemes.com/metronic" /> -->
	<!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"> -->
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--begin::Global Theme Styles(used by all pages)-->
	<link href="{{ asset('assets/admin/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/admin/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/admin/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
	<!--end::Global Theme Styles-->
	<!--begin::Layout Themes(used by all pages)-->
	<link href="{{ asset('assets/admin/css/themes/layout/header/base/light.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/admin/css/themes/layout/header/menu/light.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/admin/css/themes/layout/brand/dark.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/admin/css/themes/layout/aside/dark.css')}}" rel="stylesheet" type="text/css" />

	<!--end::Layout Themes-->
	<link rel="shortcut icon" href="{{ asset('assets/user/logo-app.png') }}" />
</head>
<body>

	<div class="card-body p-0">
		<div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
			<div class="col-md-9">
				<div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
					<h1 class="display-4 font-weight-boldest mb-10">INVOICE</h1>
					<div class="d-flex flex-column align-items-md-end px-0">
						<!--begin::Logo-->
						<a href="#" class="mb-5">
							<img src="assets/media/logos/logo-dark.png" alt="" />
						</a>
						<!--end::Logo-->
						<span class="d-flex flex-column align-items-md-end opacity-70">
							<span>{{ $user->nama_user }}, No_Telp : {{ $user->noTelp }}</span>
							<span>{{ $user->email }}</span>
						</span>
					</div>
				</div>
				<div class="border-bottom w-100"></div>
				<div class="d-flex justify-content-between pt-6">
					<div class="d-flex flex-column flex-root">
						<span class="font-weight-bolder mb-2">DATE NOW</span>
						<span class="opacity-70"><?= date('Y-m-d') ?></span>
					</div>
					<div class="d-flex flex-column flex-root">
						<span class="font-weight-bolder mb-2">ORDER ID</span>
						<span class="opacity-70">{{ $pesanan->order_id }}</span>
					</div>
					<div class="d-flex flex-column flex-root">
						<span class="font-weight-bolder mb-2">ALAMAT</span>
						<span class="opacity-70">PROV. {{ $user->provinsi_nama }}
						<br />KAB. {{ $user->kota_nama }}
						<br />KEC. {{ $user->kecamatan_nama }}
						<br />{{ $user->detail_alamat }}</span>
					</div>
				</div>
			</div>
		</div>
		<!-- end: Invoice header-->
		<!-- begin: Invoice body-->
		<div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
			<div class="col-md-9">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th class="pl-0 font-weight-bold text-muted text-uppercase">Nama Produk</th>
								<th class="text-right font-weight-bold text-muted text-uppercase">Kategori</th>
								<th class="text-right font-weight-bold text-muted text-uppercase">Harga</th>
								<th class="text-right font-weight-bold text-muted text-uppercase">Jumlah</th>
								<th class="text-right pr-0 font-weight-bold text-muted text-uppercase">Total Harga</th>
							</tr>
						</thead>
						<tbody>
							@foreach($pesanan_detail as $detail)
							<tr class="font-weight-boldest">
								<td class="pl-0 pt-7">{{ $detail->produk->nama_produk }}</td>
								<td class="text-right pt-7">{{ $detail->produk->kategori->nama_kategori }}</td>
								<td class="text-right pt-7">Rp. {{ number_format($detail->produk->harga-$detail->produk->potongan_harga) }}</td>
								<td class="text-right pt-7">{{ $detail->jumlah }} qty</td>
								<td class="text-danger pr-0 pt-7 text-right">Rp. {{ number_format($detail->total_harga) }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- end: Invoice body-->
		<!-- begin: Invoice footer-->
		<div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0">
			<div class="col-md-9">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th class="font-weight-bold text-muted text-uppercase">BANK</th>
								<th class="font-weight-bold text-muted text-uppercase">Virtual Account</th>
								<th class="font-weight-bold text-muted text-uppercase">Tanggal Pesanan</th>
								<th class="font-weight-bold text-muted text-uppercase">TOTAL PEMBAYARAN</th>
							</tr>
						</thead>
						<tbody>
							<tr class="font-weight-bolder">
								<td>{{ $pesanan->method }}</td>
								<td>{{ $pesanan->va_number }}</td>
								<td>{{ $pesanan->tanggal_pesanan }}</td>
								<td class="text-danger font-size-h3 font-weight-boldest">Rp. {{ number_format($pesanan->Subtotal_harga) }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- end: Invoice footer-->
		<!-- begin: Invoice action-->
		<div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
			<div class="col-md-9">
				<div class="d-flex justify-content-between">
					<button type="button" class="btn btn-light-primary font-weight-bold" onclick="window.print();">Download Invoice</button>
					<button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">Print Invoice</button>
				</div>
			</div>
		</div>
	</div>

	<script src="{{ asset('assets/admin/plugins/global/plugins.bundle.js') }}"></script>
	<script src="{{ asset('assets/admin/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
	<script src="{{ asset('assets/admin/js/scripts.bundle.js') }}"></script>
</body>
</html>