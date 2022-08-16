
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ORA - Watches &amp; Jewelry | Home</title>
    <meta name="description" conten="ORA - Watches &amp; Jewelry">
    <meta name="author" content="Author Name">
    <meta name="keywords" content="Or&euml; Dore, Syze, Bizhuteri, Aksesore, Outlet etc..." />
    <link rel="icon" href="{{ asset('assets/user/img/favicon.png" sizes="32x32') }}" />
    <link rel="icon" href="{{ asset('assets/user/img/favicon.png" sizes="192x192') }}" />
    <link rel="apple-touch-icon" href="{{ asset('assets/user/img/favicon.png') }}" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    

    <!-- datatables cdn -->
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="{{ asset('assets/user/css/style.css') }}">
</head>
<body>

    <div class="page-loader loader">
        <div class="cmps">
            <span class="mt-4 mx-auto d-block text-center">
                Loading<b></b><b></b><b></b>
            </span>
        </div>
    </div>

    <header class="header">
        <div class="container">
            <section class="header--main">
                <div class="mobile-menu">
                    <input id="menu__toggle" class="open-nav" type="checkbox" />
                    <label class="menu__btn" class="open" for="menu__toggle">
                        <span></span>
                    </label>
                </div>
                <div class="header--logo">
                    <a href="/">
                        <img src="{{ asset('assets/user/img/light-logo.png') }}" class="nav-logoo" alt="Ora Watches &amp; Jewelery | Logo">
                    </a>
                </div>
                @if (Route::has('login'))
                    @auth
                    <nav class="menu js-menu">
                        <ul class="ul-menu">
                            <li class="menu-item">
                                <a href="{{ url('user/keranjang/'.Auth::user()->id) }}">Keranjang</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ url('user/pesanan/'.Auth::user()->id) }}">Pesanan</a>
                            </li>
                            <li class="menu-item">
                                <a href="/carabeli">Cara Pembelian</a>
                            </li>
                            <li class="menu-item">
                                <a href="/tentang">Tentang Toko</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="darkLight-searchBox">
                        <li class="menu-item menu-item-child">
                            <a href="#" class="js-sub_menu">{{ Auth::user()->nama_user }} <i class="fa-solid fa-user"></i></a>
                            <ul class="sub-menu">
                                <li class="sub-menu-item"><a href="./products/products.html">Data Diri</a></li>
                                <li class="sub-menu-item">
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                             @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-jet-dropdown-link>
                                </form>
                                </li>
                            </ul>
                        </li>
                    </div>
                    @else

                    <nav class="menu js-menu">
                        <ul class="ul-menu">
                            <li class="menu-item">
                                <a href="#">Keranjang</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Pemesanan</a>
                            </li>
                            <li class="menu-item">
                                <a href="/carabeli">Cara Pembelian</a>
                            </li>
                            <li class="menu-item">
                                <a href="/tentang">Tentang Toko</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="darkLight-searchBox">
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login </a> |

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline"> Register</a>
                        @endif
                    </div>
                    @endauth
                @endif
                
            </section>
            <div class="progress"></div>
        </div>
    </header><!-- header-end ./ -->

    <main class="wrapper">
    <!-- content -->
    @yield('content')
    </main><!-- main-body-end ./ -->


    <footer class="footer">\
        <div class="col-12">
            <div class="copyright">
                <p class="copy">&copy;<span id="year">Copyright</span></p>
                <a href="https://my-site.com/" class="go-to-link">
                    <p class="by">By:</p>
                    <span id="author">Sai_Tech</span>
                </a>
            </div>
        </div>

        <button class="back-to-top hidden">
            <i class="uil uil-angle-up"></i>
        </button>

    </footer><!-- footer-end ./ -->

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/user/js/script.js') }}"></script>

    <!-- datatables cdn -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#tableOrder').DataTable();
        } );
    </script>
</body>
</html>