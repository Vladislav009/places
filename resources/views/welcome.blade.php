<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: black;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
			p{
				text-align: center;
			}
			</style>
    </head>
    <body>
		<header>
			@include('navbar')
		</header>

            <div class="container">
                @yield('content')
            </div>

		 <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
