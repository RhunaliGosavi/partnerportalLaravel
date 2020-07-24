<!DOCTYPE html>
<html lang="en">

<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="{{url('/assets_frontend/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('/assets_frontend/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{url('/assets_frontend/css/bootstrap-datetimepicker.min.css')}}">
  <link rel="stylesheet" href="{{url('/assets_frontend/css/style.css')}}">
  <script src="{{url('/assets_frontend/js/jquery.min.js')}}"></script>
  <script src="{{url('/assets_frontend/js/highChart.js')}}"></script>
  <script>
     var base_url = "{{url('/')}}";
  </script>
</head>

<body>
  @include('frontend.layouts.header')
  <main>
    <div class="container-fluid page-padding">
      @yield('breadcum')
      @yield('content')
    </div>
  </main>
  @include('frontend.layouts.footer')

  <!--js start-->
 <!-- <script src="{{url('/assets_frontend/js/jquery.min.js')}}"></script>-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <script src="{{url('/assets_frontend/js/bootstrap.min.js')}}"></script>
  <script src="{{url('/assets_frontend/js/owl.carousel.js')}}"></script>
  <script src="{{url('/assets_frontend/js/moment.min.js')}}"></script>
  <script src="{{url('/assets_frontend/js/bootstrap-datetimepicker.min.js')}}"></script>
  <script src="{{url('/assets_frontend/js/custom.js')}}"></script>
</body>
</html>

