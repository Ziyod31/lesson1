<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-sacel=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ $title }}</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		@include('inc.nav')
	</nav>

	<div class="container">
		@if($errors->any())
		@foreach($errors->all() as $error)
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			{{ $error }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		@endforeach
		@endif
		@if(Session('success'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			{{ Session('success') }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		@endif
		@yield('content')
	</div>

	<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>