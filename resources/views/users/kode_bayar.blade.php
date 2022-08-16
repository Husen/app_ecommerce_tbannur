<html>
  <header>
    <title>Pembayaran dan Konfirmasi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  </header>
  <body>


    <div class="container">
      <div class="row mt-2 justify-content-center">
        <div class="col-md-8 text-center">
          <h3>Selamat datang di TB-An'nur</h3>
          <h5>Selesaikan transaksi dengan <span style="color:#007bff;">Melakukan Pembayaran </span> dan <span style="color:#28a745">Konfirmasi Pesanan</span> untuk mengirim pesanan anda ke pihak kami...</h5>
        </div>
      </div>
      <div class="row mt-2 justify-content-center">
        <div class="col-md-8">
            
          <div class="form-group row">
            <label for="" class="col-sm-5 col-form-label">Order ID</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" readonly value="{{ $pesanan->order_id }}" name="order_id">
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-5 col-form-label">Tipe Pembayaran</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" readonly value="{{ $pesanan->payment_type }}" name="payment_type">
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-5 col-form-label">Menggunakan Metode</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" readonly value="{{ $pesanan->method }}" name="method">
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-5 col-form-label">Kode Pembayaran/ Virutual Account</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" readonly value="{{ $pesanan->va_number }}" name="va_number">
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-5 col-form-label">Status Pembayaran</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" readonly value="{{ $pesanan->transaction_status }}" name="transaction_status">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12 ">
              <a href="{{ url('user/pesanan/'.Auth::user()->id) }}" class="btn btn-secondary btn-block btn-lg">Kembali</a>
            </div>
          </div>

        </div>
      </div>

<!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>    
  </body>
</html>