@extends('welcome')

@section('content')
<table border="1">
	<th>Название</th>
	<th>Тип</th>
	@if( isset($places))
	@foreach($places as $place)
	<tr>
		<td><a href="places/{{$place->id}}">{{$place->name}}</a></td>
		<td>{{$place->type}}</td>
	</tr>
	@endforeach
	@endif
</table>

<a href="{{ route('form') }}">Добавить место</a>
@endsection
