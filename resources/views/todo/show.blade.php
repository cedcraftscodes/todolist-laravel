@extends('layout.app')
@section('body')
	<br>


	<div class="col-lg-6 col-lg-offset-3">
			<h1 class="text-center">
				{{ $item->title }}
			</h1>

			<div class="well">
				<p> {{$item->body}}</p>

			</div>
			<a href="/todo" class="btn btn-info pull-right">Back</a>

	</div>

@endsection