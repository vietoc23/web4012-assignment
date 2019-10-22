<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title')</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">

  <!-- Custom styles for this template -->
  @stack('styles')

</head>

<body>

  <!-- Navigation -->
  @include("frontpage.navigation")

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      @yield('content')

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        {{-- @include('frontpage.search-widget') --}}

        <!-- Categories Widget -->
        @include('frontpage.category-widget')

        

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  @include('frontpage.footer')

  <!-- jQuery 3 -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
