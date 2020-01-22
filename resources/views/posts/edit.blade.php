@extends('layouts.main', ['title' => "Редактировать пост №$post->post_id"])

@section('content')
<form method="post" action="{{ route('post.update', ['id' => $post->post_id]) }}" enctype="multipart/form-data">
	@csrf
	@method('PATCH')
	<h3>Редактировать пост</h3>

	@include('inc.form')

	<input type="submit" value="Редактировать" class="btn btn-outline-success">
</form>
@endsection