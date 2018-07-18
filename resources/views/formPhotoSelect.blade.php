@extends('welcome')

@section('content')

<form  action="{{route('photo.store.select')}}" method="post" enctype="multipart/form-data">
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

	<div class="form-group">
	    <select name="type" class="form-control">
	    	@foreach($places as $place)
                <option value="{{$place->id}}">{{$place->name}}</option>
	    	@endforeach
        </select>
    </div>

	 <button type="submit" class="btn btn-primary mb-2">Добавить</button>

</form>

@endsection
