@extends('layouts.app')

@section('content')
<div class="container">
	
	<h1>Edit post : {{ $post->title }}</h1>

	<br>

	{!! Form::model($post, ['method' => 'PATCH', 'url' => 'posts/'.$post->id]) !!}
		
		@include ('posts.form', ['submitButtonText' => 'Update Post'])		

	{!! Form::close() !!}

	@include ('errors.list')

</div>

@endsection