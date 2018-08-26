<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/">Мои любимые места</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"                 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	<ul class="navbar-nav mr-auto">
	  <li class="nav-item">
		<a class="nav-link @if( Route::currentRouteName() == 'place.form') active @endif " href="{{route('place.form')}}">Добавить место</a>
	  </li>
	  <li class="nav-item">
	   <a class="nav-link  @if (Route::currentRouteName() == 'index') active @endif" href="{{route ('index')}}">Все места</a>
	 </li>
	 <li class="nav-item">
	  <a class="nav-link  @if (Route::currentRouteName() == 'assessment.rating') active @endif" href="{{route ('assessment.rating')}}">Рейтинг мест</a>
	</li>
	  @if (Route::currentRouteName() == 'place.show')
	  <li class="nav-item">
		<a class="nav-link  @if(Route::currentRouteName() == 'photo.form') active @endif" href="{{route('photo.form',  $place->id) }}">Добавить фотографию</a>
	  </li>
	  <li class="nav-item">
	   <a class="nav-link active" href="">{{$place->name}}</a>
	 </li>
	  @else
	  <li class="nav-item">
		<a class="nav-link   @if (Route::currentRouteName() == 'photo.form.select') active @endif" href="{{route('photo.form.select') }}">Добавить фотографию</a>
	  </li>
	  @endif
	</ul>
  </div>
</nav>
