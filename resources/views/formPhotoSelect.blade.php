@extends('welcome')

@section('content')

<form  action="{{route('storePhotoSelect')}}" method="post" enctype="multipart/form-data">
		<div class="form-group">
		    @csrf
		    <input type="file" class="form-control-file" name="image">
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
