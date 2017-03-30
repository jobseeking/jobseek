@extends('layout')


@section('content')
	<script type="text/javascript">
		function validateRegistForm()
		{
			var email= $('#Email').val();
			var firstName= $('#FirstName').val();
			var lastName= $('#LastName').val();
			var password = $('#Password').val();
			var cnfPassword = $('#confirmPassword').val();
			// email pattern is correct
			var re = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

			
			// if any textbox value is empty
			if(email.length==0  || firstName.length==0  || lastName.length==0  || password.length==0  ||cnfPassword.length==0)
			{
				alert("Please enter all the information");
				return false; 
				
			}
			
			//if password less than 6
			if(password.length<=5)
			{
				alert("Password must be greater than 5 digits.");
				return false; 
			}
			
			// if both password the same
			if(password!=cnfPassword)
			{
				alert("Both password must be the same");
				return false; 
			}
			
			if(!re.test(email))
			{	
				alert("Email address is invalid");
				return false;	
			}
		}
		
		
		
	</script>






	<div class="post_form">
		<h1 class="center">Register</h1>
		<form class="form-horizontal" method="post" action="register.php">
		  <div class="form-group">
			<div class="col-sm-12">
			  <input type="text" class="form-control" id="Email" name="Email" placeholder="Email address">
			</div>
		  </div>

		  <div class="form-group">
			<div class="col-xs-6">
			  <input type="text" class="form-control" id="FirstName" name="FirstName" placeholder="First name">
			</div>

			 <div class="col-xs-6">
			  <input type="text" class="form-control" id="LastName" name="LastName" placeholder="Last name">
			</div>
		  </div>

		  <div class="form-group">
			<div class="col-sm-12">
			  <input type="password" class="form-control" id="Password" name="Password" placeholder="Password">
			</div>
		  </div>

		  <div class="form-group">
			<div class="col-sm-12">
			  <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password">
			</div>
		  </div>
		  
		  <div class="form-group">
			<div class="col-xs-12">
			  <button type="submit" class="btn btn-default" onClick="javascript:return validateRegistForm()">Create Account</button>
			</div>
		  </div>
		</form>
	</div>
@endsection



