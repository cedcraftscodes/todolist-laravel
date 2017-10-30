@extends('layout.app')
@section('body')
	<br>
	<div class="col-md-4 col-md-offset-4" >
		<h1 class="text-center">{{ucfirst(substr(Route::currentRouteName(), 5))}} Task</h1>
				  <a href="/todo" class="btn btn-info pull-right">Back</a>
		  <br><br>
		<form action="/todo/@yield('editId')" method="POST">
			@section('editMethod')
			@show


			<div class="form-group">
		    <label for="task">Title:</label>
		    <input type="text" name="title" value="@yield('editTitle')" class="form-control">
		  </div>

		  <div class="form-group">
		    <label for="task">Todo:</label>
		    <textarea class="form-control" id="task"  name="body" rows="5">@yield('editBody')</textarea>  
		  </div>

		  {{ csrf_field()}}
		 
		  <button type="submit" class="btn btn-success">Submit</button>
		</form>
		<br>

		@include('partials.error')



	</div>
@endsection