@extends('layouts/user.base')

@section('content')

<main class="mt-5 pt-4" style="min-height: 100vh;">
  <div class="container wow fadeIn">

    <!-- Heading -->
    <h2 class="my-5 h2 text-center">Metode Pengiriman Ekspedisi JNE</h2>
    
    <div class="row">

    @foreach($result as $jne)
      <div class="col-md-3">
        <div class="card">
          <div class="card-body text-center">
            <div class="row mt-2">
              <div class="col-md-12">
                <h6><strong>{{ $jne['description'] }}</strong></h6>
                <h5><strong>Rp. {{ number_format($jne['biaya']) }}</strong></h5>
                <h6><strong>Estimasi {{ $jne['etd'] }} Hari</strong></h6>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-md-12">
              <form action="{{ url('user/get_ongkir') }}" method="POST">
                @csrf
                <input type="hidden" name="id_pesanan" value="{{ $pesanan->id }}">                
                <input type="hidden" name="ongkir" value="{{ $jne['biaya'] }}">
                <button class="btn btn-success btn-block">
                  Pilih Ongkir
                </button>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach

    </div>

  </div>
</main>

@endsection