<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("css/error.css")}}">
    <link rel="preload" href="{{asset("css/style.css")}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="{{asset("css/style.css")}}"></noscript>
</head>

<body>

	<div id="notfound">
		<div class="notfound">
            <div class="row">
                    <picture>
                        <source srcset="{{asset("images/error.webp") }}" type="image/webp"/>
                        <source srcset="{{asset("images/error.png") }}" type="image/png"/>
                        <img src="{{asset("images/erro.webp") }}" id="imagenError" alt="Error" class="nosotros-logo"/>
                    </picture>
                </div>
			<h2>@yield('message')</h2>
            <h3>SEÑOR USUARIO, DISCULPE LAS MOLESTIAS, ESTAMOS TRABAJANDO PARA PRESTARLE UN MEJOR SERVICIO.</h3>
			<a href="javascript:history.back()">Volver</a>
		</div>
	</div>

</body>

</html>
