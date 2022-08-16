<html>
  <header>
    <title>Pembayaran dan Konfirmasi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  </header>
  <body>


    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 text-center">
          <h3>Selamat datang di TB-An'nur</h3>
          <h5>Selesaikan transaksi dengan <span style="color:#007bff;">Pilih metode pembayaran!</span> untuk melakukan pilihan pembayaran dan <span style="color:#28a745">Konfirmasi Pesanan</span> untuk mengirim pesanan anda ke pihak kami...</h5>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="jumbotron">
            <button id="pay-button" class="btn btn-block btn-primary">Pilih metode pembayaran!</button>
          </div>

          <form action="{{ url('user/bayar') }}" method="POST">
            @csrf
            <input type="hidden" name="id_pesanan" value="{{ $pesanan->id }}">
            <div class="form-group row">
              <label for="" class="col-sm-5 col-form-label">Order ID</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" readonly id="order_id" name="order_id">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-5 col-form-label">Tipe Pembayaran</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" readonly id="payment_type" name="payment_type">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-5 col-form-label">Menggunakan Metode</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" readonly id="method" name="method">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-5 col-form-label">Kode Pembayaran/ Virutual Account</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" readonly id="va_number" name="va_number">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-5 col-form-label">Status Pembayaran</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" readonly id="transaction_status" name="transaction_status">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 ">
                <button type="submit" class="btn btn-success btn-block btn-lg" id="konfirm" disabled="">Konfirmasi Pesanan</button>
              </div>
            </div>
          </form>
        </div>
      </div>

<!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-Jh9763pI1gUKXsF3"></script>
    <script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        // SnapToken acquired from previous step
        snap.pay('{{ $snapToken }}', {
          // Optional
          onSuccess: function(result){
            let dataResult = JSON.stringify(result, null, 2);
            let dataObj = JSON.parse(dataResult);


            if (dataObj.biller_code) {
                var va_number = dataObj.bill_key
                if (dataObj.biller_code == '70012') {
                    var method = 'mandiri Bill Code:' + dataObj.biller_code
                } else {
                    var method = dataObj.biller_code
                }
            } else if (dataObj.permata_va_number) {
                var va_number = dataObj.permata_va_number
                var method = 'permata'
            } else if (dataObj.payment_code) {
                var va_number = dataObj.payment_code
                var method = 'Indomart/Alfamart'
            } else if (dataObj.va_numbers) {
                var va_number = dataObj.va_numbers[0].va_number
                var method = dataObj.va_numbers[0].bank
            } else {
                var va_number = ''
                var method = ''
            }



            document.getElementById("order_id").value = dataObj.order_id
            document.getElementById("payment_type").value = dataObj.payment_type
            document.getElementById("method").value = method
            document.getElementById("va_number").value = va_number
            document.getElementById("transaction_status").value = dataObj.transaction_status
            document.getElementById("konfirm").removeAttribute("disabled");
            document.getElementById("pay-button").disabled = true;

            // $.ajax({
            //     type: "post",
            //     url: "/Home/kirimPesanan",
            //     data: {
            //         'order_id': dataObj.order_id,
            //         'payment_type': dataObj.payment_type,
            //         'payment_code': dataObj.payment_code
            //         'transaction_status': dataObj.transaction_status
            //     },
            //     dataType: "json",
            //     success: function(response) {
            //         // alert(response.sukses);

            //         window.location.href = '/home/order_history/';
            //     }
            // });
            console.log(JSON.stringify(result, null, 2));
            /* You may add your own js here, this is just example */ 
            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onPending: function(result){
            let dataResult = JSON.stringify(result, null, 2);
            let dataObj = JSON.parse(dataResult);


            if (dataObj.biller_code) {
                var va_number = dataObj.bill_key
                if (dataObj.biller_code == '70012') {
                    var method = 'mandiri Bill Code:' + dataObj.biller_code
                } else {
                    var method = dataObj.biller_code
                }
            } else if (dataObj.permata_va_number) {
                var va_number = dataObj.permata_va_number
                var method = 'permata'
            } else if (dataObj.payment_code) {
                var va_number = dataObj.payment_code
                var method = 'Indomart/Alfamart'
            } else if (dataObj.va_numbers) {
                var va_number = dataObj.va_numbers[0].va_number
                var method = dataObj.va_numbers[0].bank
            } else {
                var va_number = ''
                var method = ''
            }



            document.getElementById("order_id").value = dataObj.order_id
            document.getElementById("payment_type").value = dataObj.payment_type
            document.getElementById("method").value = method
            document.getElementById("va_number").value = va_number
            document.getElementById("transaction_status").value = dataObj.transaction_status
            document.getElementById("konfirm").removeAttribute("disabled");
            document.getElementById("pay-button").setAttribute("disabled");

            // $.ajax({
            //     type: "post",
            //     url: "/Home/kirimPesanan",
            //     data: {
            //         'order_id': dataObj.order_id,
            //         'payment_type': dataObj.payment_type,
            //         'payment_code': dataObj.payment_code
            //         'transaction_status': dataObj.transaction_status
            //     },
            //     dataType: "json",
            //     success: function(response) {
            //         // alert(response.sukses);

            //         window.location.href = '/home/order_history/';
            //     }
            // });
            console.log(JSON.stringify(result, null, 2));
            /* You may add your own js here, this is just example */ 
            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onError: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          }
        });
      };
    </script>
  </body>
</html>