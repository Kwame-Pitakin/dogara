<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../assets/"
  data-template="vertical-menu-template-no-customizer"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - Analytics | Frest - Bootstrap Admin Template</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons -->
    {{-- <link rel="stylesheet" href="../../assets/vendor/fonts/boxicons.css" /> --}}
    <link rel="stylesheet" href="{{ url('assets/vendor/fonts/boxicons.css') }}">

    {{-- <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome.css" /> --}}
    <link rel="stylesheet" href="{{ url('assets/vendor/fonts/fontawesome.css') }}">
    {{-- <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" /> --}}
    <link rel="stylesheet" href="{{ url('assets/vendor/fonts/flag-icons.css') }}">

    <!-- Core CSS -->
    {{-- <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" /> --}}
    <link rel="stylesheet" href="{{ url('assets/vendor/css/rtl/core.css') }}">
    {{-- <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" /> --}}
    <link rel="stylesheet" href="{{ url('assets/vendor/css/rtl/theme-default.css') }}">
    {{-- <link rel="stylesheet" href="../../assets/css/demo.css" /> --}}
    <link rel="stylesheet" href="{{ url('assets/css/demo.css') }}">

    <!-- Vendors CSS -->
    {{-- <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" /> --}}
    <link rel="stylesheet" href="{{ url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}">
    {{-- <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" /> --}}
    <link rel="stylesheet" href="{{ url('assets/vendor/libs/typeahead-js/typeahead.css') }}">
    {{-- <link rel="stylesheet" href="../../assets/vendor/libs/apex-charts/apex-charts.css" /> --}}
    <link rel="stylesheet" href="{{ url('assets/vendor/libs/apex-charts/apex-charts.css') }}">

    <!-- Page CSS -->

    <!-- Helpers -->
    {{-- <script src="../../assets/vendor/js/helpers.js"></script> --}}

    <script src="{{ url('assets/vendor/js/helpers.js') }}"></script>


    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    {{-- <script src="../../assets/js/config.js"></script> --}}
    <script src="{{ url('assets/js/config.js') }}"></script>

    
   

  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        @include('onlineVendor.layouts.aside')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          @include('onlineVendor.layouts.nav')


          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            @yield('content')
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-fluid d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="https://pixinvent.com" target="_blank" class="footer-link fw-semibold">PIXINVENT</a>
                </div>
                <div>
                  <a href="https://themeforest.net/licenses/standard" class="footer-link me-4" target="_blank"
                    >License</a
                  >
                  <a href="https://1.envato.market/pixinvent_portfolio" target="_blank" class="footer-link me-4"
                    >More Themes</a
                  >

                  <a
                    href="https://pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/documentation-bs5/"
                    target="_blank"
                    class="footer-link me-4"
                    >Documentation</a
                  >

                  <a href="https://pixinvent.ticksy.com/" target="_blank" class="footer-link d-none d-sm-inline-block"
                    >Support</a
                  >
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    {{-- <script src="../../assets/vendor/libs/jquery/jquery.js"></script> --}}
    <script src="{{ url('assets/vendor/libs/jquery/jquery.js') }}"></script>
    {{-- <script src="../../assets/vendor/libs/popper/popper.js"></script> --}}
    <script src="{{ url('assets/vendor/libs/popper/popper.js') }}"></script>
    {{-- <script src="../../assets/vendor/js/bootstrap.js"></script> --}}
    <script src="{{ url('assets/vendor/js/bootstrap.js') }}"></script>
    {{-- <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script> --}}
    <script src="{{ url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.j') }}"></script>

    {{-- <script src="../../assets/vendor/libs/hammer/hammer.js"></script> --}}
    <script src="{{ url('assets/vendor/libs/hammer/hammer.js') }}"></script>

    {{-- <script src="../../assets/vendor/libs/i18n/i18n.js"></script> --}}
    <script src="{{ url('assets/vendor/libs/i18n/i18n.js') }}"></script>
    {{-- <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script> --}}
    <script src="{{ url('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>

    {{-- <script src="../../assets/vendor/js/menu.js"></script> --}}
    <script src="{{ url('assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="{{ url('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    {{-- <script src="../../assets/js/main.js"></script> --}}
    <script src="{{ url('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    {{-- <script src="../../assets/js/dashboards-analytics.js"></script> --}}
    <script src="{{ url('assets/js/dashboards-analytics.js') }}"></script>
  </body>
</html>
