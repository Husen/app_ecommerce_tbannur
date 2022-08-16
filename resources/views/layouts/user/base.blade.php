
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>TB An-Nur E-Commerce</title>
  <link rel="shortcut icon" href="{{ asset('logo-app.ico') }}" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('assets/user/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{ asset('assets/user/css/mdb.min.css') }}" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="{{ asset('assets/user/css/style.min.css') }}" rel="stylesheet">
  <style type="text/css">
    html,
    body,
    header,
    .carousel {
      height: 60vh;
    }

    @media (max-width: 740px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }

  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">
        <img src="{{ asset('assets/user/logo-app.png') }}" style="width: 60px;">
      </a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ml-3">
            <a class="nav-link waves-effect" href="/">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item ml-3">
            <a class="nav-link waves-effect" href="/tentang">Tentang</a>
          </li>
          <li class="nav-item ml-3">
            <a class="nav-link waves-effect" href="/cara-beli">Cara Belanja</a>
          </li>
        </ul>
        
        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
          @if (Route::has('login'))
          @auth

          <li class="nav-item mr-3">
            <a class="nav-link waves-effect" href="{{ url('user/keranjang/'.Auth::user()->id) }}">
              <span class="badge red z-depth-1 mr-1"> {{ $bnyak }} </span>
              <i class="fas fa-shopping-cart"></i>
              <span class="clearfix d-none d-sm-inline-block"> Keranjang </span>
            </a>
          </li>
          <li class="nav-item mr-3">
            <a class="nav-link waves-effect" href="{{ url('user/pesanan/'.Auth::user()->id) }}">
              <i class="fas fa-file-alt"></i>
              <span class="clearfix d-none d-sm-inline-block"> Pesanan </span>
            </a>
          </li>

          <li class="nav-item">
            <div class="dropdown">
              <a class="nav-link waves-effect dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="far fa-user"></i> {{ Auth::user()->nama_user }}
              </a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="{{ url('user/profil/'.Auth::user()->id) }}">Data Diri</a>
                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
              </div>
            </div>
            <!-- <a class="nav-link waves-effect">
              <i class="far fa-user"></i>
              <span class="clearfix d-none d-sm-inline-block"> Saidina Husen </span>
            </a> -->
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link waves-effect" href="{{ route('login') }}">
              <i class="fas fa-sign-in-alt"></i> Login
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="{{ route('register') }}">
              <i class="fad fa-user-plus"></i>Daftar
            </a>
          </li>
          @endauth
          @endif

        </ul>
      </div>

    </div>
  </nav>
  <!-- Navbar -->

  @yield('content')

  <!--Footer-->
  <footer class="page-footer text-center font-small mt-4 wow fadeIn">

    <!--Copyright-->
    <div class="footer-copyright py-3">
      © 2022 Copyright:
      <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank"> {{ env('APP_DEV')}} </a>
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <!-- <script type="text/javascript" src="{{ asset('assets/user/js/jquery-3.4.1.min.js') }}"></script> -->
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{ asset('assets/user/js/popper.min.js') }}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{ asset('assets/user/js/bootstrap.min.js') }}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{ asset('assets/user/js/mdb.min.js') }}"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>
  

  <script>
    $(document).ready(function(){
      //ini ketika provinsi tujuan di klik maka akan eksekusi perintah yg kita mau
      //name select nama nya "provinve_id" kalian bisa sesuaikan dengan form select kalian
      $('select[name="province_id"]').on('change', function(){
        // kita buat variable provincedid untk menampung data id select province
        let provinceid = $(this).val();
        //kita cek jika id di dpatkan maka apa yg akan kita eksekusi
        if(provinceid){
          // jika di temukan id nya kita buat eksekusi ajax GET
          jQuery.ajax({
            // url yg di root yang kita buat tadi
            url:"/user/cek-kota/"+provinceid,
            // aksion GET, karena kita mau mengambil data
            type:'GET',
            // type data json
            dataType:'json',
            // jika data berhasil di dapat maka kita mau apain nih
            success:function(data){
              // jika tidak ada select dr provinsi maka select kota kososng / empty
              $('select[name="kota_id"]').empty();
              // jika ada kita looping dengan each
              $.each(data, function(key, value){
                // perhtikan dimana kita akan menampilkan data select nya, di sini saya memberi name select kota adalah kota_id
                $('select[name="kota_id"]').append('<option value="'+ value.city_id +'" namakota="'+ value.type +' ' +value.city_name+ '">' + value.type + ' ' + value.city_name + '</option>');
              });
            }
          });
        }else {
          $('select[name="kota_id"]').empty();
        }
      });
    });
  </script>

  <script type="text/javascript">
    var checkboxes = $("input[type='checkbox']"),
        inputPass = $("input[name='password']");

    checkboxes.click(function() {
        inputPass.attr("disabled", !checkboxes.is(":checked"));
    });
  </script>

</body>

</html>
