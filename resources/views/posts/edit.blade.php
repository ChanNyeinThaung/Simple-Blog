@extends('layouts/app')

@section('content')
	<div class="container">
		<h3>New Post</h3>

		<form method="post">
			{{ csrf_field() }}

			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" class="form-control" value="{{ $post->title }}">
			</div>

			<div class="form-group">
				<label>Body</label>
				<textarea name="body" class="form-control">{{ $post->body }}</textarea>
			</div>

			<div class="form-group">
				<label>Category</label>
				<select class="form-control" name="category_id">
					@foreach($categories as $category)
						@if($category->id==$post->category_id)
							<option value="{{ $category->id }}" selected>{{ $category->name }}</option>
						@else
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endif
					@endforeach
				</select>
			</div>

			<input type="submit" value="Update Post" class="btn btn-primary">
		</form>
		
	</div>
@endsection
