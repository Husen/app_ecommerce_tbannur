@extends('layouts/user.base')

@section('content')

<main class="mt-5 pt-4">
  <div class="container wow fadeIn">

    <!-- Heading -->
    <h2 class="my-5 h2 text-center">Halaman Profil</h2>

    <!--Grid row-->
    <div class="row">

      <!--Grid column-->
      <div class="col-md-12 mb-4">

        <!--Card-->
        <div class="card">

          <!--Card content-->
          <form class="card-body" action="{{ url('user/update_profil') }}" method="POST">
            @csrf
            <!--address-->
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" name="nama_user" value="{{ $user->nama_user }}" class="form-control" required>
            </div>

            <div class="form-group form-group--inline">
              <label for="provinsi">Provinsi</label>
              <select name="province_id" id="provinsi_id" class="form-control">
              <option value="">
                @if($user->provinsi_nama === NULL)
                  -- Pilih Provinsi --
                @else
                  {{ $user->provinsi_nama }}
                @endif
              </option>
              @foreach ($provinsi  as $row)
              <option value="{{$row['province_id']}}" namaprovinsi="{{$row['province']}}">{{$row['province']}}</option>
              @endforeach
              </select>
            </div>

            <div class="form-group">
              <label>Kota<span>*</span>
              </label>
              <select name="kota_id" id="kota_id" class="form-control">
              <option>
                @if($user->kota_nama === NULL)
                  -- Pilih Kota --
                @else
                  {{ $user->kota_nama }}
                @endif
              </option>
              </select>
            </div>
            @if($user->provinsi_nama === NULL)
            <input type="hidden" name="kecamatan_id" value="0">
            @endif

            @if($user->kota_nama == NULL)

            @elseif($user->kota_id == 104)

            <div class="form-group">
              <label>Kecamatan</label>
              </label>
              <select name="kecamatan_id" class="form-control" required>
              @if($user->kecamatan_id == 0)
                <option>-- Pilih Kecamatan --</option>
              @else
                <option>{{ $user->kecamatan->nama_kecamatan }}</option>
              @endif

              @foreach($kecamatan as $kecamatans)
                <option value="{{ $kecamatans->id }}">
                  {{ $kecamatans->nama_kecamatan }}
                </option>
              @endforeach
              </select>
            </div>

            @elseif($user->kota_id != 104)

            <div class="form-group">
              <label>Kecamatan</label>
              <input type="hidden" name="kecamatan_id" value="0" class="form-control" required>
              <input type="text" name="kecamatan_nama" value="{{ $user->kecamatan_nama }}" class="form-control" required>
            </div>        
            @endif    

            @if($user->kota_nama != NULL)

            <div class="form-group">
              <label>Desa</label>
              <input type="text" name="desa" value="{{ $user->desa }}" class="form-control" required>
            </div>    

            <div class="form-group">
              <label>Kode Pos</label>
              <input type="number" name="kode_pos" value="{{ $user->kode_pos }}" class="form-control" required> 
            </div>    

            <div class="form-group">
              <label>No WhatsApp / Telepon (Aktif)</label>
              <input type="number" name="noTelp" value="{{ $user->noTelp }}" placeholder="08" class="form-control" required>
            </div>    
            
            <div class="form-group">
              <label>Detail alamat dan jalan</label>
              <textarea name="detail_alamat" class="form-control" required>{{ $user->detail_alamat }}</textarea>
            </div>     

            @endif

            <!-- <div class="form-group">
              <label class="checkbox mb-0">
                <input type="checkbox" required name="agree" />
                <span></span>
                  Konfirmasi perubahan dengan mengisi password dibawah
              </label>
            </div>
            <div class="form-group d-flex flex-wrap pb-lg-0 pb-3">
              <input type="password" name="password" disabled class="form-control" required placeholder="Isi Password Anda">
            </div> -->

            <hr class="mb-4">
            <button type="submit" class="btn btn-primary btn-lg btn-block" type="submit">Update</button>

          </form>

        </div>
        <!--/.Card-->

      </div>
      <!--Grid column-->


    </div>
    <!--Grid row-->

  </div>
</main>
<!--Main layout-->

@include('sweetalert::alert')

@endsection