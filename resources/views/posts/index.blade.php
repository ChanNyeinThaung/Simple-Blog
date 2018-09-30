@extends('layouts/app')

@section('content')
	<div class="container">

		@if(session('info'))
			<div class="alert alert-danger">
				{{ session('info') }}
			</div>
		@endif

		@foreach($posts as $post)
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
					<span>{{ $post->created_at->diffForHumans() }}</span>,
					Comments ({{ count($post->comments) }})
				</div>
			</div>
			<br><br>
		@endforeach
		{{ $posts->links() }} <!-- page link -->
	</div>
@endsection
