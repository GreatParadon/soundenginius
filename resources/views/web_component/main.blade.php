<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Theme Made By www.w3schools.com - No Copyright -->
    <title>SOUNDENGINIUS</title>
    <meta charset="utf-8">
    <meta name="google-site-verification" content="3D5U4Sx42okjiUjHaiXIsoqVOQAYkxTEyFU6PGR7L24"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Basic stylesheet -->
    <link rel="stylesheet" href="{{ asset('plugins/owl-carousel/owl.carousel.css') }}">

    <!-- Default Theme -->
    <link rel="stylesheet" href="{{ asset('plugins/owl-carousel/owl.theme.css') }}">
    <link href="{{ asset("plugins/lightbox/css/lightbox.css")}}" rel="stylesheet" type="text/css"/>
    <style>
        body {
            color: #818181;
            font-family: 'Kanit', sans-serif;
        }

        h1 {
            color: #2c3e50;
        }

        h2 {
            text-transform: uppercase;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        h3 {
            color: #2c3e50;
        }

        h4 {
            margin-bottom: 30px;
        }

        .jumbotron {
            background-color: #2c3e50;
            color: #fff;
            padding: 100px 25px;
            font-family: 'Kanit', sans-serif;
        }

        .container-seq {
            margin-top: 20px;
        }

        .bg-grey {
            background-color: #f6f6f6;
        }

        .logo-small {
            color: #2c3e50;
            font-size: 50px;
        }

        .logo {
            color: #2c3e50;
            font-size: 200px;
        }

        .thumbnail {
            padding: 0 0 15px 0;
            border: none;
            border-radius: 0;
        }

        .thumbnail img {
            width: 100%;
            height: 100%;
            margin-bottom: 10px;
            object-fit: cover;
        }

        .carousel-control.right, .carousel-control.left {
            background-image: none;
            color: #2c3e50;
        }

        .carousel-indicators li {
            border-color: #2c3e50;
        }

        .carousel-indicators li.active {
            background-color: #2c3e50;
        }

        .item h4 {
            font-size: 19px;
            line-height: 1.375em;
            font-weight: 400;
            font-style: italic;
            margin: 70px 0;
        }

        .item span {
            font-style: normal;
        }

        .panel {
            border: 1px solid #2c3e50;
            border-radius: 0 !important;
            transition: box-shadow 0.5s;
        }

        .panel:hover {
            box-shadow: 5px 0px 40px rgba(0, 0, 0, .2);
        }

        .panel-footer .btn:hover {
            border: 1px solid #2c3e50;
            background-color: #fff !important;
            color: #2c3e50;
        }

        .panel-heading {
            color: #fff !important;
            background-color: #2c3e50 !important;
            padding: 25px;
            border-bottom: 1px solid transparent;
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
            border-bottom-left-radius: 0px;
            border-bottom-right-radius: 0px;
        }

        .panel-footer {
            background-color: white !important;
        }

        .panel-footer h3 {
            font-size: 32px;
        }

        .panel-footer h4 {
            color: #aaa;
            font-size: 14px;
        }

        .panel-footer .btn {
            margin: 15px 0;
            background-color: #2c3e50;
            color: #fff;
        }

        .message-alert {
            position: absolute;
            top: 210px;
            right: 30px;
        }

        a, a :active, a :visited, a:focus, a:hover {
            color: #2c3e50;
            text-decoration: none;
        }

        .carousel-inner .item img {
            display: block;
            width: 1280px;
            height: 350px;
            margin-left: auto;
            margin-right: auto;
        }

        .bg-light-gray {
            padding: 50px;
            background-color: #eee;
        }

        .bg-white {
            padding: 50px;
            background-color: #fff;
        }

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Facebook Pixel Code -->
    <script>
        !function (f, b, e, v, n, t, s) {
            if (f.fbq)return;
            n = f.fbq = function () {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1874454109443616');
        fbq('track', 'PageView');
        fbq('track', 'ViewContent', {
            value: 3.50,
            currency: 'USD'
        });
    </script>
    <noscript>
        <img height="1" width="1"
             src="https://www.facebook.com/tr?id=1874454109443616&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <img src="{{ asset('resource/header.gif') }}" style="width:100%;" class="img-responsive"
                 alt="Responsive image">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            @include('web_component.header')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            {{--            @include('web_component.banner')--}}
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $banner = \App\Models\Banner::where('active', 1)->orderBy('seq', 'ASC')->get();
                    $count = 0;
                    ?>
                    @foreach($banner as $r)
                        <div class="item @if($count == 0) active @endif">
                            <img src="{{ filePath('banner',$r->image) }}" class="fixed-image img-responsive"
                                 style="width:100%;">
                        </div>
                        <?php $count++ ?>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            @yield('content')
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            @include('web_component.footer')
        </div>
    </div>
</div>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<script src="{{ asset('plugins/owl-carousel/owl.carousel.js') }}"></script>
<script src="{{ asset("/plugins/lightbox/js/lightbox.js")}}"></script>

</body>
</html>