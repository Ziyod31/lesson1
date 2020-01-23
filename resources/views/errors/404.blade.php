@extends('layouts.main', ['title' => 'Страница не существует !'])

@section('content')

<div class="card">
	<img src="{{ asset('img/404.gif') }}">
</div>

@endsection