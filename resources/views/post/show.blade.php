@extends('layouts.master')

@section('content')
	<div class="col-sm-8 blog-main">
		<h1>{{ $post->title }}</h1>

		{{ $post->body }}

		<hr> 

		<div class="comments">
			<ul class="list-group">
				@foreach($post->comments as $comment)
					<li class="list-group-item">
						{{ $comment->created_at->diffForHumans() }}&nbsp;by {{ $comment->user->name }}: &nbsp;
						<strong>
							{{ $comment->body }}
						</li>
					</strong>
				@endforeach
			</ul>
		</div>

		<hr>

		<div class="card">
			<div class="card-block">
				<form method="POST" action="/post/{{ $post->id }}/comments">
					{{ csrf_field() }}
					<div class="form-group">
						<textarea name="body" placeholder="Your comment here." class="form-control" required></textarea>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary">Add Comment</button>
					</div>
				</form>
				@include('layouts.errors')
			</div>
		</div>
	</div>
	
@endsection