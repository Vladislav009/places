@extends('welcome')

@section('content')
<p>Название - {{$place->name}}</p>
<p>Тип - {{$place->type->type}}</p>


<p> <img src="{{ asset($place->photos->url)}}" alt=""> </p>

@endsection
