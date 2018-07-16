@extends('welcome')

@section('content')
<p>Название - {{$place->name}}</p>
<p>Тип - {{$place->type}}</p>
@foreach($photos as $photo)
<p> <img src="{{ asset($photo->url)}}" alt=""> </p>
@endforeach
<a href="/places/{{$place->id}}/photos/add">Добавить фото</a>
<a href="/places">Назад</a>
@endsection
