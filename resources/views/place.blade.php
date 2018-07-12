@extends('welcome')

@section('content')
<p>Название - {{$place->name}}</p>
<p>Тип - {{$place->type}}</p>
@if(isset($fil))
@foreach($fil as $key=> $fi)
<p> <img src="http://places.local/storage/{{$fi}}" alt=""> </p>
@endforeach
@endif
<a href="/places/{{$place->id}}/photos/add">Добавить фото</a>
<a href="/places">Назад</a>
@endsection
