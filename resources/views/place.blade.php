@extends('welcome')

@section('content')
<p>Название - {{$place->name}}</p>
<p>Тип - {{$place->type->type}}</p>

@if(isset($photos))
@foreach($place->photos as $photo)
<p> <img src="{{ asset($photo->url)}}" alt=""> </p>
@endforeach
@endif
@endsection
