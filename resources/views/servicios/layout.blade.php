<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Grúas y Parqueaderos Bogotá @yield('titulo')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link type="image/x-icon" rel="icon" href="{{asset("images/favicon.png")}}">
        <meta name="description" content="Somos una empresa especializada en el servicio de transporte de vehículos inmovilizados y
        servicios de parqueaderos.">
        <meta name="keywords"
        content="gyp Bogotá Colombia Gruas parqueaderos vehículos inmovilizados secretaria movilidad comparendos policía transito soluciones pagos en línea liquidación concesión " />
        <meta name="author" content="Grúas y Parqueaderos Bogotá S.A.S">
        <meta property="og:title"
        content="Grúas y Parqueaderos Bogotá S.A.S | Servicio de parqueaderos y transporte de vehículos inmovilizados" />
        <meta property="og:type" content="Página Web Informativa" />
        <meta property="og:url" content="http://www.gruasyparqueaderosbogota.com" />
        <meta property="og:image" content="{{asset("images/face_logo.jpg")}}" />
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="images/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,700|Oswald:400,700" rel="stylesheet">

        <link rel="preload" href="{{asset("fonts/icomoon/style.css")}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="{{asset("fonts/icomoon/style.css")}}"></noscript>
        <link rel="preload" href="{{asset("css/bootstrap.min.css")}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}"></noscript>
        <link rel="stylesheet" href="{{asset("css/jquery.fancybox.min.css")}}">
        <link rel="stylesheet" href="{{asset("css/owl.theme.default.min.css")}}">
        <link rel="stylesheet" href="{{asset("fonts/flaticon/font/flaticon.css")}}">
        <link rel="stylesheet" href="{{asset("css/aos.css")}}">
        <link rel="preload" href="{{asset("css/gruas.css")}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="{{asset("css/gruas.css")}}"></noscript>
        <link rel="preload" href="{{asset("css/style.css")}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="{{asset("css/style.css")}}"></noscript>
        @yield("styles")
    </head>
    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
        <div id="overlayer"></div>
        <div class="loader">
          <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
          </div>
        </div>
        <div class="site-wrap" id="home-section">
            @include("servicios.topBar")
            @include("servicios.menu")
            <div class="ftco-blocks-cover-1">
                @yield("barraInformacion")
                <br>
                @yield("contenido")
            </div>
            @include("servicios.footer")
            <script src="{{asset("js/jquery.min.js")}}"></script>
            <script src="{{asset("js/popper.min.js")}}"></script>
            <script src="{{asset("js/bootstrap.min.js")}}"></script>
            <script src="{{asset("js/owl.carousel.min.js")}}"></script>
            <script src="{{asset("js/jquery.sticky.js")}}"></script>
            <script src="{{asset("js/jquery.waypoints.min.js")}}"></script>
            <script src="{{asset("js/jquery.animateNumber.min.js")}}"></script>
            <script src="{{asset("js/jquery.fancybox.min.js")}}"></script>
            <script src="{{asset("js/jquery.easing.1.3.js")}}"></script>
            <script src="{{asset("js/aos.js")}}"></script>
            <script src="{{asset("js/subpagina.js")}}"></script>
            <script src="{{asset("js/main.js")}}"></script>
            <script type="text/javascript">
                function googleTranslateElementInit() {
                    new google.translate.TranslateElement({ pageLanguage: 'es-Es', includedLanguages: 'ar,ca,de,en,es,fr,it,ja,ru,tr,zh-CN', layout: google.translate.TranslateElement.InlineLayout.SIMPLE }, 'google_translate_element');
                }
            </script>
            <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
            @yield("scripts")
        </div>
    </body>
</html>
