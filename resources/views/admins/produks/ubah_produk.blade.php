<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ubah Produk</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
	<div class="container">
		<h2 class="mt-3">Ubah Data Produk</h2>

		@if($message = Session::get('error'))
			<div class="alert alert-warning" role="alert">
			  {{ $message }}
			</div>
		@endif
	

		<form action="/update_produk/{{$produk->id}}" method="POST" enctype="multipart/form-data">
			
	    	@csrf
		    <div class="mb-3">
		      <label class="form-label">Nama Produk</label>
		      <input type="text" name="nama_produk" value="{{ $produk->nama_produk }}" class="form-control" >
		    </div>

		    <div class="mb-3">
		      <label class="form-label">Stok</label>
		      <input type="number" name="stok" value="{{ $produk->stok }}" class="form-control" >
		    </div>

		    <div class="mb-3">
		      <label class="form-label">Berat</label>
		      <input type="number" name="berat" value="{{ $produk->berat }}" class="form-control" >
		    </div>

		    <div class="mb-3">
		      <label class="form-label">Harga</label>
		      <input type="number" name="harga" value="{{ $produk->harga }}" class="form-control" >
		    </div>

		    <div class="mb-3">
		      <label class="form-label">Keterangan</label>
		      <textarea class="form-control" name="keterangan">{{ $produk->deskripsi_produk }}</textarea>
		    </div>

		    <a href="/kelola_produk" class="btn btn-secondary" data-bs-dismiss="modal">Batal</a>
	        <button type="submit" class="btn btn-primary">Simpan</button>
		</form>
	</div>
	    


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>