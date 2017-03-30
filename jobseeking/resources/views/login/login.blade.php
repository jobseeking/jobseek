@extends('layout')


@section('content')
	<script>

		function onClickSubmit(){

		    $.ajax({
		              url:  "api/authenticate",
		              type:"POST",
		              data: 
		                {
		                    email: $('#Email').val(),
		                    password: $('#Password').val()
		                },
		              contentType:"application/x-www-form-urlencoded",
		              timeout: 9000, // in milliseconds
		              success: function(data, status){
		                    //alert("Data: " + data + "\nStatus: " + status);
		                    
		                    console.log(JSON.stringify(status)); 
		                    console.log(JSON.stringify(data));
		                    //console.log(data.token);
		                    if(status == 'success'){
		                        alert( "Login Success" );
		                        localStorage.setItem("my_token", data.token);
		                        window.location = "#";
		                        //alert("success");
		                    }else{
		                        //alert("status not success");
		                    }
		              }
		    }).done(function() {
		                //alert( "done" );
		            })
		      .fail(function(xhr, status, error) {
		                alert( "Login Fail" );
		                //alert( xhr );
		                //alert( status );
		                //alert( error );
		                console.log(JSON.stringify(xhr));
		                console.log(JSON.stringify(status)); 
		                console.log(JSON.stringify(error)); 

		       });




		}



		$(document).ready(function(){       

		    var token = localStorage.getItem("my_token");

		    if (token != null){
		        console.log("Token found.");
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
		                            window.location = "#"; 
		                        }else{
		                            localStorage.removeItem("my_token");
		                            //$("#login-form").css({ display: "block"});
		                        }
		                  }
		        }).done(function() {
		                   
		                })
		          .fail(function(xhr, status, error) {
		                console.log(JSON.stringify(xhr));
		                console.log(JSON.stringify(status)); 
		                console.log(JSON.stringify(error)); 
		                localStorage.removeItem("my_token");
		                //$("#login-form").css({ display: "block"});
		           });
		    }else{
		        console.log("Token not exist.");
		        //$("#login-form").css({ display: "block"});
		    }



		});

	</script>






	<div class="post_form">
		<h1 class="center">Log in</h1>
		<div class="form-horizontal">
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
		      <button type="submit" class="btn btn-default" onclick="onClickSubmit()">Log in</button>
		    </div>
		  </div>
		</div>

		<div class="row">
			<div class="col-sm-offset-2 col-sm-10">
				Don't have an account? <a href="register">Register</a>
			</div>
		</div>
	</div>

@endsection


