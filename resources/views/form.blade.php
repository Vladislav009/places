@extends('welcome')

@section('content')

<form  action="{{ route('create') }}" method="post">
	{{ csrf_field() }}
	Введите название места:<input type="text" name="name">
	<select name="type">
		@foreach($types as $type)
            <option value="{{$type->type}}">{{$type->type}}</option>
		@endforeach
    </select>
	<input type="submit" name="" value="Добавить">
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
<a href="/places">На главную</a>
@endsection
