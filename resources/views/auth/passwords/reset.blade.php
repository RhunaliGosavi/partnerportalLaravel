<html>
<head>

    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <link href="{{url('assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/demo/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{url('assets/demo/default/media/img/logo/favicon.ico')}}" />
</head>
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page">
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-grid--tablet-and-mobile m-grid--hor-tablet-and-mobile m-login m-login--1 m-login--signin" id="m_login">
                <div class="m-grid__item m-grid__item--order-tablet-and-mobile-2 m-login__aside">
                    <div class="m-stack m-stack--hor m-stack--desktop">
                        <div class="m-stack__item m-stack__item--fluid">
                            <div class="m-login__wrapper">
                                <div class="m-login__logo">
                                    <a href="#">
                                        <img src="{{url('assets/app/media/img/logos/logo-2.png')}}">
                                    </a>
                                </div>
                                
                                <div class="m-login__signin">
                                      
                                    <form class="m-login__form m-form" action="{{ route('password.request') }}" method="POST">
                                        @csrf
                                         <input type="hidden" name="token" value="{{ $token }}">
                                        <div class="form-group m-form__group">
                                            <input class="form-control m-input" type="text" placeholder="Email" name="email" autocomplete="off" value="{{ old('email') }}" required>
                                            @if ($errors->has('email'))
                                                <div class="form-control-feedback">
                                                    {{ $errors->first('email') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group m-form__group">
                                            <input class="form-control m-input" type="password" placeholder="Password" name="password" required>
                                            @if ($errors->has('password'))
                                                <div class="form-control-feedback">
                                                    {{ $errors->first('password') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group m-form__group">
                                            <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Confirm Password" name="password_confirmation" required>
                                            @if ($errors->has('password_confirmation'))
                                                <div class="form-control-feedback">
                                                    {{ $errors->first('password_confirmation') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="m-login__form-action">
                                            <button id="" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air" type="submit">Reset Password</button>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-grid__item m-grid__item--fluid m-grid m-grid--center m-grid--hor m-grid__item--order-tablet-and-mobile-1  m-login__content m-grid-item--center" style="background-image: url(../../assets/app/media/img//bg/bg-4.jpg)">
                    <div class="m-grid__item">
                        <h3 class="m-login__welcome">AFL</h3>
                        <p class="m-login__msg">
                            constantly listening and learning so that the customer has the best digital experience
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{url('assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
        <script src="{{url('assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>
        <script src="{{url('assets/snippets/custom/pages/user/login.js')}}" type="text/javascript"></script>    
</body>
</html>