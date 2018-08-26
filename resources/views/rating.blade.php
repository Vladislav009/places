@extends('welcome')

@section('content')
<div class="row title m-b-md justify-content-center">
    <table border="1" class="table">
    	<th>Название</th>
		<th>Рейтинг</th>
    	@if( isset($places))
    	@foreach($places as $place)
    	<tr>
    		<td><a href="{{route ('place.show',$place->id)}}">{{$place->name}}</a></td>
			@foreach($place->assessments as $assessment)
			<td>{{$assessment->sum('like')}}</td>
			@endforeach
    	</tr>
    	@endforeach
    	@endif
    </table>
</div>
@endsection
