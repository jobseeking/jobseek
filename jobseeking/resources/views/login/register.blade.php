@extends('layout')


@section('content')




<style>
.post_form{
    display: none;
    position: relative;

    width: 30%;
    height: 50%;
    left: 35%; /* (100 - width)/2 */
    top: 25%;  /* (100% - height)/2 */
}

@media only screen and (max-width: 1224px) {
    /* For mobile phones: */
    .post_form{
	    width: 40%;
	    height: 50%;
	    left: 30%; /* (100 - width)/2 */
	    top: 25%;  /* (100% - height)/2 */
	}
}

@media only screen and (max-width: 768px) {
    /* For mobile phones: */
    .post_form{
	    width: 80%;
	    height: 50%;
	    left: 10%; /* (100 - width)/2 */
	    top: 25%;  /* (100% - height)/2 */
	}
}

</style>


	<script type="text/javascript">

		function check_login_callback(is_login){
			console.log("register : check_login_callback : " + is_login);
			if(is_login){
				window.location = "{{$base_url}}/"; // redirect to home
			}else{
				$("#register_div").css({ display: "block"});
			}
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
		              url: "{{$base_url}}/api/register",
		              type:"POST",
		              data: 
		                {
		                    name : $('#FirstName').val(),
		                    last_name: $('#LastName').val(),
		                    email: $('#Email').val(),
		                    password: $('#Password').val(),
		                    interest_classification_id: $('#interest_classification_id').val(),
		                    interest_classification_id_2: $('#interest_classification_id_2').val()
		                },
		              contentType:"application/x-www-form-urlencoded",
		              timeout: 9000, // in milliseconds
		              success: function(data, status){
		                    //alert("Data: " + data + "\nStatus: " + status);
		                    
		                    console.log(JSON.stringify(status)); 
		                    console.log(JSON.stringify(data));

		                    if(status == 'success'){
		                        alert( "Register Success" );
		                        window.location = "{{$base_url}}/login";
		                        //alert("success");
		                    }else{
		                        //alert("status not success");
		                    }
		              }
		    }).done(function() {
		                //alert( "done" );
		            })
		      .fail(function(xhr, status, error) {
		      			if (typeof xhr.responseJSON.error !== 'undefined') {
							alert( "Register Fail : " + xhr.responseJSON.error );
						}else{
							alert( "Register Fail");
						}

		                console.log(JSON.stringify(xhr));
		                console.log(JSON.stringify(status)); 
		                console.log(JSON.stringify(error)); 

		       });




		}


		function onSelectInterestChange(){

			var interest_classification_id = document.getElementById("interest_classification_id").value;
         
            $(".skills_display").css({ display: "none"  });
            $(".skills_display").removeClass("skills_display");

            $("#classification_"+interest_classification_id+"_skill").css({ display: "block"  });
            $("#classification_"+interest_classification_id+"_skill").addClass("skills_display");
            console.log("display block id : " + "classification_"+interest_classification_id+"_skill");
      
            /*
			if (interest_classification_id == 1){
				$("#skill_experience_1").css({ display: "block" });
	            $("#skill_experience_2").css({ display: "none"  });
			}else if (interest_classification_id == 2) {
				$("#skill_experience_1").css({ display: "none" });
	            $("#skill_experience_2").css({ display: "block"  });
			}
			*/

		}

	</script>






	<div class="post_form" id="register_div" >
		<div class="well">
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
		          <label for="location" class="col-sm-2 control-label">Location</label>
		          <div class="col-sm-10">
		            <select class="form-control" name="location_id">
		              @foreach ( $locations as $location )
		                <option value ="{{$location->id}}" > {{$location->name}} </option> 
		              @endforeach
		            </select>
		          </div>
	          </div>

			  <div class="form-group">
		          <label for="education" class="col-sm-2 control-label">Education</label>
		          <div class="col-sm-10">
		            <select class="form-control" name="education_id">
		                <option value ="" > High School </option> 
		                <option value ="" > Bachelor's Degree </option> 
		                <option value ="" > Master's degree </option> 
		                <option value ="" > Doctor's degree </option> 
		            </select>
		          </div>
	          </div>

			  <div class="form-group">
		          <label for="classification" class="col-sm-2 control-label">Interest</label>
		          <div class="col-sm-5">
		            <select class="form-control" id="interest_classification_id" name="interest_classification_id" onchange="onSelectInterestChange()">
		              @foreach ( $classifications as $classification )
		                <option value ="{{$classification->id}}" > {{$classification->name}} </option>
		              @endforeach   
		            </select>
		          </div>


		          @foreach ( $classifications as $classification )
		              @if ( $classification->id == 1)
		              <div class="col-sm-5 skills_display" 
		                   id="classification_{{$classification->id}}_skill" >
		              @else
		              <div class="col-sm-5" 
		                   id="classification_{{$classification->id}}_skill" style="display:none" >
		              @endif

		              @foreach ( $classification_skills as $classification_skill )
		                  @if ( $classification->id == 
		                        $classification_skill->classification_id)
				              <select class="form-control" name="classification_skill_{{$classification_skill->id}}">
					              <option value ="0" > {{$classification_skill->name}} No Experience </option>
					              <option value ="1" > {{$classification_skill->name}} < 1 year </option>
					              <option value ="3" > {{$classification_skill->name}} 1 ~ 3 years </option>
					              <option value ="5" > {{$classification_skill->name}} 3 ~ 5 years </option>
					              <option value ="10"> {{$classification_skill->name}} > 5 years </option>
					          </select>
		                  @endif
		              @endforeach  
		              </div> 
		          @endforeach   
		          <!--
			          <div class="col-sm-5" id = "skill_experience_1">
			            <select class="form-control" >
			                <option value ="" > Java No Experience </option>
			                <option value ="" > Java < 1 year </option>
			                <option value ="" > Java 1 ~ 3 years </option>
			                <option value ="" > Java 3 ~ 5 years </option>
			                <option value ="" > Java > 5 years </option>
			            </select>
			            <select class="form-control" >
			                <option value ="" > .NET No Experience </option>
			                <option value ="" > .NET < 1 year </option>
			                <option value ="" > .NET 1 ~ 3 years </option>
			                <option value ="" > .NET 3 ~ 5 years </option>
			                <option value ="" > .NET > 5 years </option>
			            </select>
			            <select class="form-control" >
			                <option value ="" > PHP No Experience </option>
			                <option value ="" > PHP < 1 year </option>
			                <option value ="" > PHP 1 ~ 3 years </option>
			                <option value ="" > PHP 3 ~ 5 years </option>
			                <option value ="" > PHP > 5 years </option>
			            </select>
			          </div>
		          -->
		      </div>
<!--
			  <div class="form-group">
		          <label for="classification" class="col-sm-2 control-label"> </label>
		          <div class="col-sm-10">
		            <select class="form-control" id="interest_classification_id_2" name="interest_classification_id_2">
		              @foreach ( $classifications as $classification )
		                <option value ="{{$classification->id}}" > {{$classification->name}} </option>
		              @endforeach   
		            </select>
		          </div>
		      </div>
-->

			  <div class="form-group">
				<div class="col-xs-12">
				  <button type="submit" class="btn btn-primary" onClick="javascript:return validateRegistForm()">Create Account</button>
				</div>
			  </div>
			</div>
		</div>
	</div>
@endsection



