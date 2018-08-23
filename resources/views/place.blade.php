@extends('welcome')

@section('content')
<p>Название - {{$place->name}}</p>
<p>Тип - {{$place->type->type}}</p>
<p>Общая оценка места</p>

@foreach($place->photos as $photo)
<p> <img src="{{ asset($photo->url)}}" alt=""> </p>
<a href="{{route ('assessment.like_photo',$photo->id)}}"><i class="fas fa-thumbs-up"></i></a>

@foreach($photo->assessments as $like)
<span class="assessment">{{$like->like}}</span>
@endforeach


<a href="{{route ('assessment.dislike_photo',$photo->id)}}"><i class="fas fa-thumbs-down"></i></a>

@endforeach
@endsection
