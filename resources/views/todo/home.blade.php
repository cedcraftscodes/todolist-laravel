
@extends('layout.app')
@section('body')
	<div class="col-lg-6 col-lg-offset-3" >
		<br>

		<h1 class="text-center">Todo List</h1>

		  <a href="/todo/create" class="btn btn-info pull-right">Add new</a>
		  <br><br>

		  <ul class="list-group">
		  	@foreach($todos as $todo)
		    <li class="list-group-item">
		    	<div class="row" style="padding: 10px;">
		    				    	<a  href="{{'/todo/'.$todo->id}}">{{ $todo->title }}</a>
		    	
 
			    <form class='form-group pull-right' method="POST" action="{{'/todo/'.$todo->id}}">
			    	{{csrf_field()}}
			    	{{method_field('DELETE')}}	
			    	   	&nbsp;
			    	<button type="submit" class="btn btn-sm btn-danger" value="Delete" style="border:none;"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>


			    </form>	
			
		    		<a class="btn btn-sm btn-primary pull-right" href="{{'/todo/'.$todo->id.'/edit/'}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>


		    	<span class="pull-right">&nbsp;{{ $todo->created_at->diffForHumans() }}&nbsp;</span>




		    	</div>

		    </li>
		  	@endforeach
		  	<br>
		  </ul>


		  		@include('partials.message')







	</div>
@endsection