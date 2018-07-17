@extends('welcome')

@section('content')
<p>Название - {{$place->name}}</p>
<p>Тип - {{$place->type}}</p>
@foreach($photos as $photo)
    <p> <img src="{{ asset($photo->url)}}" alt=""> </p>
@endforeach

@endsection
