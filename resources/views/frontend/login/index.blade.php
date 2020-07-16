<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="{{url('/assets_frontend/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('/assets_frontend/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{url('/assets_frontend/css/style.css')}}">
</head>

<body>
  <div class="login-page">
    <div class="left-sec">
      <div class="logo">
        <img src="{{url('assets_frontend/images/axis-dark-logo.svg')}}">
      </div>
      <div class="login-img">
        <img src="{{url('assets_frontend/images/login-pic.svg')}}">
      </div>
    </div>
    <div class="right-sec">
      <div class="login-form">
        <div class="logo">
          <img src="{{url('assets_frontend/images/axis-logo.svg')}}">
        </div>
        <h1>Welcome !</h1>
        <h2>Sign in to your account</h2>
        <?php
        print_r($errors);
        ?>
        <div class="login-form-in">
          <form action="{{url('employee/login')}}" method="post">
            {{ csrf_field() }}
            <ul>
              <li><label>AFL Employee ID</label></li>
              <li class="uid">
                <input type="text" class="custom-input" name="employee_id">
                @if ($errors->has('employee_id'))
                    <div class="form-control-feedback">
                        {{ $errors->first('employee_id') }}
                    </div>
                @endif
              </li>
              <li><label>Password</label></li>
              <li class="pwd">
                <input type="password" class="custom-input" name="password">
                @if ($errors->has('password'))
                    <div class="form-control-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
              </li>
              <li><button class="btn login-btn">LOGIN</button></li>
            </ul>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!--js start-->
  <script src="{{url('/assets_frontend/js/jquery.min.js')}}"></script>
  <script src="{{url('/assets_frontend/js/bootstrap.min.js')}}"></script>
  <script src="{{url('/assets_frontend/js/owl.carousel.js')}}"></script>
  <script src="{{url('/assets_frontend/js/custom.js')}}"></script>
</body>
</html>

