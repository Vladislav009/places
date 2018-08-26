@extends('welcome')

@section('content')
<div class="row title m-b-md justify-content-center">
    <table border="1" class="table">
    	<th>Название</th>
		<th>Оценка</th>
    	<th>Тип</th>
    	@if( isset($places))
    	@foreach($places as $place)
    	<tr>
    		<td><a href="{{route ('place.show',$place->id)}}">{{$place->name}}</a></td>
			<td>
				<a href="{{route ('assessment.like', $place->id)}}"><i class="fas fa-thumbs-up"></i></a>
				<span>{{$place->assessments->where('type_assessment_id', 1)->count()}}</span>
				<span>{{$place->assessments->where('type_assessment_id', 2)->count()}}</span>
				<a href="{{route ('assessment.dislike', $place->id)}}"><i class="fas fa-thumbs-down"></i></a>
			</td>
    		<td>{{$place->type->type}}</td>
    	</tr>
    	@endforeach
    	@endif
    </table>
</div>
@endsection
