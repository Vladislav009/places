@extends('welcome')

@section('content')

<form action="{{route('storePhoto', $id)}}" method="post" enctype="multipart/form-data">
	<div class="form-group">
	    @csrf
	    <input type="file" class="form-control-file" name="image">
    </div>
	<button type="submit" class="btn btn-primary">Добавить</button>
</form>
<a href="{{route('show', $id)}}">Назад</a>

@endsection
