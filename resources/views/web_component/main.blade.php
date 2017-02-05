<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Theme Made By www.w3schools.com - No Copyright -->
    <title>SOUNDENGINIUS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">

    <!-- Basic stylesheet -->
    <link rel="stylesheet" href="{{ asset('plugins/owl-carousel/owl.carousel.css') }}">

    <!-- Default Theme -->
    <link rel="stylesheet" href="{{ asset('plugins/owl-carousel/owl.theme.css') }}">
    <link href="{{ asset("/plugins/lightbox/css/lightbox.css")}}" rel="stylesheet" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script src="{{ asset('plugins/owl-carousel/owl.carousel.js') }}"></script>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

@include('web_component.header')
{{--<div class="text-center" style="height: 200px; background-color:#fd7424; color: #ffffff;" id="index_header">--}}
    {{----}}
    {{--<h1 style="padding-top: 70px; color: #ffffff">SOUNDENGINIUS</h1>--}}
{{--</div>--}}

<div class="container container-seq text-center">
    <div class="pull-right message-alert">
        @include('web.message')
    </div>
    <div class="row">
        <div class="col-sm-2 text-left">
            @include('web_component.sidebar')
        </div>
        <div class="col-sm-10 text-left">
            @yield('content')
        </div>
    </div>
</div>
@include('web_component.footer')

<script>
    $(document).ready(function () {

        $(window).show(function () {
            $(".slideanim").each(function () {
                $(this).addClass("slide");
            });
        });
    });
</script>

<script src="{{ asset("/plugins/lightbox/js/lightbox.js")}}"></script>

</body>
</html>