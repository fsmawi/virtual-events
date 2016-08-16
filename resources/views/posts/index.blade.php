@extends('layouts.app')

@section('content')

<h1>Posts</h1>

@foreach ($posts as $post)
	<article>
		<h2>
			<a href="{{ url('/posts', $post->id) }}" class="">{{ $post->title }}</a>
		</h2>

		<div class="body">{{ $post->body }}</div>
	</article>
@endforeach

{{ $posts->links() }}

@endsection