@extends('layout')


@section('content')

	<div class="post_form">
		<h1 class="center">Log in</h1>
		<form class="form-horizontal">
		  <div class="form-group">
		    <label for="Email" class="col-sm-2 control-label">Email address</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="Email" placeholder="Email address">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="Password" class="col-sm-2 control-label">Password</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" id="Password" placeholder="Password">
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Log in</button>
		    </div>
		  </div>
		</form>

		<div class="row">
			<div class="col-sm-offset-2 col-sm-10">
				Don't have an account? <a href="register">Register</a>
			</div>
		</div>
	</div>

@endsection


