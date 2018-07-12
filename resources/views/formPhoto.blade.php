@extends('welcome')

@section('content')

<form action="" method="post" enctype="multipart/form-data">
	@csrf
	<input type="file" name="image">
	<button type="submit">Добавить</button>
</form>
<a href="/places/{{$id}}">Назад</a>

@endsection
