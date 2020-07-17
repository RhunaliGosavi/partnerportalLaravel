<!DOCTYPE html>
<html lang="en">

<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{url('/assets_frontend/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('/assets_frontend/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{url('/assets_frontend/css/style.css')}}">
  <script src="{{url('/assets_frontend/js/jquery.min.js')}}"></script>
  <script>
     var base_url = "{{url('/')}}";
  </script>
</head>

<body>
  @include('frontend.layouts.header')
  <main>
    @yield('content')
  </main>
  @include('frontend.layouts.footer')

  <!--js start-->
  <script src="{{url('/assets_frontend/js/bootstrap.min.js')}}"></script>
  <script src="{{url('/assets_frontend/js/owl.carousel.js')}}"></script>
  <script src="{{url('/assets_frontend/js/custom.js')}}"></script>
</body>
</html>

