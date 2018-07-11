@extends('welcome')

@section('content')
<p>Название - {{$place->name}}</p>
<p>Тип - {{$place->type}}</p>
<p> <img src="{{$url}}" alt=""> </p>
<a href="/places/{{$place->id}}/photos/add">Добавить фото</a>
<a href="/places">Назад</a>
@endsection
