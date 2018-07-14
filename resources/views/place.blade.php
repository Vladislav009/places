@extends('welcome')

@section('content')
<p>Название - {{$place->name}}</p>
<p>Тип - {{$place->type}}</p>
@if(isset($url))
@foreach($url as $key=> $ur)
<p> <img src="{{$ur}}" alt=""> </p>
@endforeach
@endif
<a href="/places/{{$place->id}}/photos/add">Добавить фото</a>
<a href="/places">Назад</a>
@endsection
