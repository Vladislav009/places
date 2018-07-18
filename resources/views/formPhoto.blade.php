@extends('welcome')

@section('content')

<form action="{{route('photo.store', $id)}}" method="post" enctype="multipart/form-data">
	<div class="form-group">
	    @csrf
	    <input type="file" class="form-control-file" name="image">
		@if (count($errors) > 0)
		  <div class="alert alert-danger">
		    <ul>
		      @foreach ($errors->all() as $error)
		        <p>{{ $error }}</p>
		      @endforeach
		    </ul>
		  </div>
		@endif
    </div>
	<button type="submit" class="btn btn-primary">Добавить</button>
</form>
<a href="{{route('place.show', $id)}}">Назад</a>

@endsection
