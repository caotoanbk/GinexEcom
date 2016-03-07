@extends('layouts.app')
@section('content')
	<div class="features-items">
<h2 class="title text-center">Write a New Article</h2>

	
	{!! Form::open(['url' => 'articles']) !!}
		@include('articles.form', ['submitButtonText' => 'Add Article'])
	{!! Form::close() !!}
	@include('errors.list')
@stop
