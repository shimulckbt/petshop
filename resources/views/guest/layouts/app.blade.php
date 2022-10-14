<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pet Shop</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('guest/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('guest/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700">
    <!-- owl carousel-->
    <link rel="stylesheet" href="{{ asset('guest/vendor/owl.carousel/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/vendor/owl.carousel/assets/owl.theme.default.css') }}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('guest/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('guest/css/custom.css') }}">
    <link href="{{ asset('panel/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
    <!-- navbar-->
    @include('guest.body.header')

    <!-- Main Content -->
    @yield('content')
    <!-- Main Content End -->

    <!--FOOTER-->
    @include('guest.body.footer')
    <!-- FOOTER END -->


    <!--COPYRIGHT-->
    @include('guest.body.copyright')
    <!--COPYRIGHT END-->

    <!-- JavaScript files-->
    <script src="{{ asset('guest/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('guest/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('guest/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('guest/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('guest/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js') }}"></script>
    <script src="{{ asset('guest/js/front.js') }}"></script>
    <script src="{{ asset('panel/js/bootstrap-datepicker.min.js') }}"></script>
    @yield('script')

    <style type="text/css">
        label.btn {
            padding: 0;
        }

        label.btn input {
            opacity: 0;
            position: absolute;
        }

        label.btn span {
            text-align: center;
            padding: 6px 12px;
            display: block;
            min-width: 80px;
        }

        label.btn input:checked+span {
            background-color: rgb(80, 110, 228);
            color: #fff;
        }
    </style>
</body>

</html>
