@extends('layouts.main', ['title' => "Создать новый пост"]))

@section('content')
<form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
	@csrf
	<h3>Создать пост</h3>

	@include('inc.form')

	<input type="submit" value="Создать пост" class="btn btn-outline-success">
</form>
@endsection