<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layout.include.top')

  </head>
  <body>
    <div class="container-scroller">
     
      <!-- partial:partials/_navbar.html -->
    @include('layout.include.nav')

     
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
    @include('layout.include.side')

      
        <!-- partial -->
        <div class="main-panel">
          @yield('content')
         
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
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