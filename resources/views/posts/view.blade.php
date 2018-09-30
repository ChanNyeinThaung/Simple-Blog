@extends('layouts/app')

@section('content')
<div class="container">

	<div class="card bg-light">        <!-- panel panel-default -->
		<div class="card-header">      <!-- panel-heading -->
			<a href="{{ url('posts/view/'.$post->id)  }}">
				{{ $post->title }}</a>
			</div>

			<div class="card-body">         <!-- panel body -->
				<p>{{ $post->body }}</p>
			</div>

			<div class="card-footer">		<!-- panel-footer -->
				<i> {{ $post->category->name }}</i>,
				<small>{{ $post->created_at->diffForHumans() }}</small>

				<a href="{{ url('posts/edit/' . $post->id) }}">Edit</a>
				<a href="{{ url('posts/delete/' . $post->id) }}" class="text-danger">Delete</a>
			</div>
		</div>
		<br><br>
		<hr>

		<h4>Comments ({{ count($post->comments) }})</h4><br> <!-- counting comments -->
		@foreach($post->comments as $comment)
		<div calss="card">
			<div class="card-body">
				<p>{{ $comment->comment }}</p>
			</div>
		</div>
		@endforeach


		<form action="{{ url('comments/add') }}" method="post">
			{{ csrf_field() }}

			<input type="hidden" name="post_id" value="{{ $post->id }}">
			<textarea name="comment" class="form-control"></textarea><br>
			<input type="submit" value="Add Comment" class="btn btn-info">
		</form>

	</div>
	
	@endsection
