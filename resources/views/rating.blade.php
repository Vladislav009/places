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

			<td>{{$ratingPhoto}}</td>

    	</tr>
    	@endforeach
    	@endif
    </table>
</div>
@endsection
