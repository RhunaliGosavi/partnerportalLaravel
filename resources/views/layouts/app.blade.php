<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AFL') }}</title>
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <!-- <script src="{{url('assets/js/ckeditor.js')}}" type="text/javascript"></script> -->
    <!-- <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script> -->
    <link href="{{url('assets/css/summernote.min.css')}}" rel="stylesheet">
    <script src="{{url('assets/js/summernote.min.js')}}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
        var base_url = "{{url('/')}}";
        var nofifySuccessMessage = "{{session('success')}}";
        var nofifyErrorMessage = "{{session('error')}}";
    </script>

    <link href="{{url('assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/demo/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{url('assets/demo/default/media/img/logo/favicon.ico')}}" />
    <script src="{{url('assets/js/jquery.min.js')}}" type="text/javascript"></script>
</head>
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

    <div class="m-grid m-grid--hor m-grid--root m-page">
        @include('layouts.header')
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
            @include('layouts.sidebar')
            <div class="m-grid__item m-grid__item--fluid m-wrapper">
                <div class="m-content">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
    <script src="{{url('assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        if('' !== nofifySuccessMessage && 'undefined' !== nofifySuccessMessage) {
            $.notify(nofifySuccessMessage,{
                placement: {
                    from: "top", 
                    align: "right"
                },
                delay:3000,
                timer:3000,
                type:'success'
            });
        }
        

        if('' !== nofifyErrorMessage && 'undefined' !== nofifyErrorMessage) {
            $.notify(nofifyErrorMessage,{
                placement: {
                    from: "top", 
                    align: "right"
                },
                delay:3000,
                timer:3000,
                type:'danger'
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200,
            });
        });
    </script>
</body>
</html>
