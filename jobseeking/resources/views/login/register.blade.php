@extends('layout')


@section('content')
	<script type="text/javascript">

		function check_login_callback(is_login){
			console.log("register : check_login_callback : " + is_login);
		} 

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

			onClickSubmit();
		}
		
		
		

		function onClickSubmit(){

		    $.ajax({
		              url: "api/register",
		              type:"POST",
		              data: 
		                {
		                    name : $('#FirstName').val(),
		                    last_name: $('#LastName').val(),
		                    email: $('#Email').val(),
		                    password: $('#Password').val()
		                },
		              contentType:"application/x-www-form-urlencoded",
		              timeout: 9000, // in milliseconds
		              success: function(data, status){
		                    //alert("Data: " + data + "\nStatus: " + status);
		                    
		                    console.log(JSON.stringify(status)); 
		                    console.log(JSON.stringify(data));

		                    if(status == 'success'){
		                        alert( "Register Success" );
		                        window.location = "login";
		                        //alert("success");
		                    }else{
		                        //alert("status not success");
		                    }
		              }
		    }).done(function() {
		                //alert( "done" );
		            })
		      .fail(function(xhr, status, error) {
		                alert( "Register Fail" );
		                //alert( xhr );
		                //alert( status );
		                //alert( error );
		                console.log(JSON.stringify(xhr));
		                console.log(JSON.stringify(status)); 
		                console.log(JSON.stringify(error)); 

		       });




		}


/*
		$(document).ready(function(){       
		    var token = localStorage.getItem("my_token");

		    if (token != null){
		        console.log("login token is : " + token);
		        
		        $.ajax({
		                  url:  "api/authenticate/user",
		                  type:"GET",
		                  timeout: 9000, // in milliseconds
		                  beforeSend: function (xhr) {
		                        xhr.setRequestHeader ("Authorization", "Bearer " + token);
		                  },
		                  success: function(data, status){
		                        
		                        console.log(JSON.stringify(status)); 
		                        console.log(JSON.stringify(data));
		                        
		                        if(status == 'success'){
		                            
		                            alert( "Login Already!" );
		                            window.location = "./"; // redirect to home
		                        }else{
		                            localStorage.removeItem("my_token");
		                        }
		                  }
		        }).done(function() {
		                   
		                })
		          .fail(function(xhr, status, error) {
		                console.log(JSON.stringify(xhr));
		                console.log(JSON.stringify(status)); 
		                console.log(JSON.stringify(error)); 
		                localStorage.removeItem("my_token");
		           });
		    }else{
		        console.log("Token not exist.");
		        
		    }



		});

*/

	</script>






	<div class="post_form">
		<h1 class="center">Register</h1>
		<div class="form-horizontal"  >
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
		</div>
	</div>
@endsection



