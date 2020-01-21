@extends('layouts.main')

@section('content')
<form method="POST" action="" enctype="multipart/form-data">
	@csrf
	<h3>Создать пост</h3>
	<div class="form-group">
		<input type="text" class="form-control" name="title">
	</div>
	<div class="form-group">
		<textarea name="descr" rows="10" class="form-control"></textarea>
	</div>
	<div class="form-group">
		<input type="file" name="img">
	</div>

	<input type="submit" value="Создать пост" class="btn btn-outline-success">
</form>
@endsection