@extends('welcome')

@section('content')
<div class="row title m-b-md justify-content-center">
    <table border="1" class="table">
    	<th>Название</th>
		<th colspan="2">Оценка</th>
    	<th>Тип</th>
    	@if( isset($places))
    	@foreach($places as $place)
    	<tr>
    		<td><a href="{{route ('place.show',$place->id)}}">{{$place->name}}</a></td>
			<td>
				<a href="{{route ('assessment.like',$place->id)}}"><i class="fas fa-thumbs-up"></i></a>
				@foreach($place->assessments as $like)
				<p>{{$like->like}}</p>
				@endforeach
			</td>
			<td>
				<a href="{{route ('assessment.dislike',$place->id)}}"><i class="fas fa-thumbs-down"></i></a>
				@foreach($place->assessments as $like)
				<p>{{$like->dislike}}</p>
				@endforeach
			</td>
    		<td>{{$place->type->type}}</td>
    	</tr>
    	@endforeach
    	@endif
    </table>
</div>
@endsection
