<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layout.include.top')

  </head>
  <body>
    <div class="container-scroller">

      <!--navbar-->
    @include('layout.include.nav')


      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!--sidebar-->
    @include('layout.include.side')


        <!-- partial -->
        <div class="main-panel">
          @yield('content')

          <!-- content-wrapper ends -->
          <!--footer-->
          @include('layout.include.footer')

          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('layout.include.bottom')




    <!-- End custom js for this page -->
  </body>
</html>
