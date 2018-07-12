@extends('welcome')

@section('content')

<form  action="{{ route('create') }}" method="post">
	{{ csrf_field() }}
	Введите название места:<input type="text" name="name">
	<select name="type">
        <option value="Город">Город</option>
		<option value="Природа">Природа</option>
    </select>
	<input type="submit" name="" value="Добавить">
</form>
<a href="/places">На главную</a>
@endsection
