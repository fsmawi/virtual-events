@extends('layouts.app')

@section('content')
<div class="container">
	
	<h1>Create post</h1>

	<br>

	{!! Form::open(['url' => 'posts']) !!}

		@include ('posts.form', ['submitButtonText' => 'Add Post'])		
	
	{!! Form::close() !!}

	@include ('errors.list')	

</div>

@endsection