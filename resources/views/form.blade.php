@extends('welcome')

@section('content')

<form  action="{{ route('place.create') }}" method="post">
	<div class="form-group">
		{{ csrf_field() }}
		<label for="text_place">Введите название места:</label>
		<input id="text_place" type="text" name="name" class="form-control">
	</div>
	<div class="form-group">
	    <select name="type_id" class="form-control">
	    	@foreach($types as $type)
                <option value="{{$type->id}}">{{$type->type}}</option>
	    	@endforeach
        </select>
    </div>
	 <button type="submit" class="btn btn-primary mb-2">Добаить</button>

</form>
@if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
      @endforeach
    </ul>
  </div>
@endif
@endsection
