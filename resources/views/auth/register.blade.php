

<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head><base href="../../../">
  <meta charset="utf-8" />
  <title>Daftar Akun E-Commerce TB. An-Nur</title>
  <meta name="description" content="Login page example" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="canonical" href="https://keenthemes.com/metronic" />
  <!--begin::Fonts-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
  <!--end::Fonts-->
  <link href="{{ asset('assets/admin/css/pages/login/login-1.css') }}" rel="stylesheet" type="text/css" />
  <!--end::Page Custom Styles-->
  <!--begin::Global Theme Styles(used by all pages)-->
  <link href="{{ asset('assets/admin/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/admin/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/admin/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
  <!--end::Global Theme Styles-->
  <!--begin::Layout Themes(used by all pages)-->
  <link href="{{ asset('assets/admin/css/themes/layout/header/base/light.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/admin/css/themes/layout/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/admin/css/themes/layout/brand/dark.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/admin/css/themes/layout/aside/dark.css') }}" rel="stylesheet" type="text/css" />
  <!--end::Layout Themes-->
  <link rel="shortcut icon" href="{{ asset('logo-app.ico') }}" />
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
  <!--begin::Main-->
  <div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
      <!--begin::Aside-->
      <div class="login-aside d-flex flex-column flex-row-auto" style="background-color: #0000;">
        <!--begin::Aside Top-->
        <div class="d-flex flex-column-auto flex-column pt-lg-5 pt-5">
          <!--begin::Aside header-->
          <a href="#" class="text-center mb-3">
            <img src="{{ asset('assets/admin/media/logos/logo-letter-1.png') }}" class="max-h-70px" alt="" />
          </a>
          <!--end::Aside header-->
          <!--begin::Aside title-->
          <h3 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg" style="color: #986923;">Selamat Datang di
            <br />Toko Online TB An-Nur</h3>
            <br>
            <a href="" class="text-center">
              <img src="{{ asset('assets/user/logo-app.png') }}">
              
            </a>
            <!--end::Aside title-->
          </div>
          <!--end::Aside Top-->
          <!--begin::Aside Bottom-->
          <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-image: url(<?= asset("assets/admin/media/svg/illustrations/login-visual-1.svg") ?>)">            
          </div>
          <!--end::Aside Bottom-->
        </div>
        <!--begin::Aside-->
        <!--begin::Content-->
        <div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
          <!--begin::Content body-->
          <div class="d-flex flex-column-fluid flex-center">
            <!--begin::Signin-->
            
            
                <!--begin::Signup-->
                <div class="login-form login-signin">
                  <!--begin::Form-->
                  <!-- daftar -->
                  <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!--begin::Title-->
                    <div class="pb-13 pt-lg-0 pt-5">
                      <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Daftar</h3>
                      <span class="text-muted font-weight-bold font-size-h4">Sudah punya akun?
                      <a href="/login" class="text-primary font-weight-bolder">Klik Untuk Login</a></span>
                    </div>
                    <!--end::Title-->
                    <!--begin::Form group-->
                    <div class="form-group">
                      <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="text" placeholder="Nama Lengkap" required name="nama_user" autocomplete="off" />
                      @error('nama_user')
                      <span class="font-weight-bold text-danger" style="margin-right: 20px;">{{ $message }}</span>
                      @enderror
                    </div>
                    <!--end::Form group-->
                    <!--begin::Form group-->
                    <div class="form-group">
                      <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="email" placeholder="Email" required name="email" autocomplete="off" />
                      @error('email')
                      <span class="font-weight-bold text-danger" style="margin-right: 20px;">{{ $message }}</span>
                      @enderror
                    </div>
                    
                      <!-- <span class="alert text-danger">erorr</span> -->
                    
                    <!--end::Form group-->
                    <!--begin::Form group-->
                    <div class="form-group">
                      <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="password" placeholder="Password" required name="password" autocomplete="off" />
                      @error('password')
                      <span class="font-weight-bold text-danger" style="margin-right: 20px;">{{ $message }}</span>
                      @enderror
                    </div>
                    <!--end::Form group-->
                    <!--begin::Form group-->
                    <div class="form-group">
                      <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="password" placeholder="Confirm password" required name="password_confirmation" autocomplete="off" />
                      @error('password_confirmation')
                      <span class="font-weight-bold text-danger" style="margin-right: 20px;">{{ $message }}</span>
                      @enderror
                    </div>


                    <div class="form-group">
                      <label class="checkbox mb-0">
                        <input type="checkbox" required name="agree" />
                        <span></span>
                        <div class="ml-2">
                          Saya setuju dengan syarat dan ketentuan pada TB. An-Nur
                        </div>
                      </label>
                    </div>
                    <!--end::Form group-->
                    <!--begin::Form group-->
                    <div class="form-group d-flex flex-wrap pb-lg-0 pb-3">
                      <input type="submit" value="Daftar" disabled class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">
                    </div>
                    <!--end::Form group-->
                  </form>
                  <!--end::Form-->
                </div>
                <!--end::Signup-->
              </div>
              <!--end::Content body-->
              <!--begin::Content footer-->
              <div class="d-flex justify-content-lg-start justify-content-center align-items-end py-7 py-lg-0">
                <div class="text-dark-50 font-size-lg font-weight-bolder ">
                    <span class="mr-1"><?= date('Y') ?>??</span>
                    <a href="#" target="_blank" class="text-dark-75 text-hover-primary">{{ env('APP_DEV')}}</a>
                  </div>
              <!--end::Content footer-->
            </div>
            <!--end::Content-->
          </div>
          <!--end::Login-->
        </div>
        <!--end::Main-->
        <script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
        <!--begin::Global Config(global config for global JS scripts)-->
        <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
        <!--end::Global Config-->
        <!--begin::Global Theme Bundle(used by all pages)-->
        <script src="{{ asset('assets/admin/plugins/global/plugins.bundle.js') }}"></script>
        <script src="{{ asset('assets/admin/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
        <script src="{{ asset('assets/admin/js/scripts.bundle.js') }}"></script>
        <!--end::Global Theme Bundle-->
        <!--begin::Page Scripts(used by this page)-->
        <script src="{{ asset('assets/admin/js/pages/custom/login/login-general.js') }}"></script>
        <!--end::Page Scripts-->
        <script type="text/javascript">
          var checkboxes = $("input[type='checkbox']"),
              submitButt = $("input[type='submit']");

          checkboxes.click(function() {
              submitButt.attr("disabled", !checkboxes.is(":checked"));
          });
        </script>
      </body>
      <!--end::Body-->
    </html>