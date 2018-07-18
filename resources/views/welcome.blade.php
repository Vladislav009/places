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
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			  <a class="navbar-brand" href="#">Мои любимые места</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"                 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
				  <li class="nav-item">
					<a class="nav-link {{ Route::currentRouteName('') == 'place.form'  ? "active" : null }}" href="{{route('place.form')}}">Добавить место</a>
				  </li>
				  @if (Route::currentRouteName() == 'place.show')
				  <li class="nav-item">
					<a class="nav-link  {{ Route::currentRouteName('') == 'photo.form'  ? "active" : null }}" href="{{route('photo.form',  $place->id) }}">Добавить фотографию</a>
				  </li>
				  @else
				  <li class="nav-item">
					<a class="nav-link  {{ Route::currentRouteName('') == 'photo.form.select'  ? "active" : null }}" href="{{route('photo.form.select') }}">Добавить фотографию</a>
				  </li>
				  @endif
				  <li class="nav-item">
					<a class="nav-link  {{ Route::currentRouteName('') == 'index'  ? "active" : null }}" href="{{route ('index')}}">Все места</a>
				  </li>
				  @if (Route::currentRouteName() == 'place.show')
				  <li class="nav-item">
					<a class="nav-link  {{ Route::currentRouteName('') == 'place.show'  ? "active" : null }}" href="">{{$place->name}}</a>
				  </li>
				  @endif
				</ul>
			  </div>
			</nav>
		</header>

            <div class="container">
                @yield('content')
            </div>

		 <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
