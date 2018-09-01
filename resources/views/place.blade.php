@extends('welcome')

@section('content')
<p>Название - {{$place->name}}</p>
<p>Тип - {{$place->type->type}}</p>
<p>Общая оценка места:{{$ratingPlace}}</p>

@foreach($place->photos as $photo)

<p> <img src="{{ asset($photo->url)}}" alt=""> </p>


<a href="{{route ('assessment.like_photo',$photo->id)}}"><i class="fas fa-thumbs-up"></i></a>
<span class="assessment">{{$photo->assessments->where('type_assessment_id', 1)->count()}}</span>
<span class="assessment">{{$photo->assessments->where('type_assessment_id', 2)->count()}}</span>
<a href="{{route ('assessment.dislike_photo',$photo->id)}}"><i class="fas fa-thumbs-down"></i></a>
<p> </p>





@endforeach
@endsection
