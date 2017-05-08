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
				
			}else{
				window.location = "{{$base_url}}/"; // redirect to home
			}
		} 

		
		function onSelectInterestChange(){

			var interest_classification_id = document.getElementById("interest_classification_id").value;
         
            $(".skills_display").css({ display: "none"  });
            $(".skills_display").removeClass("skills_display");

            $("#classification_"+interest_classification_id+"_skill").css({ display: "block"  });
            $("#classification_"+interest_classification_id+"_skill").addClass("skills_display");
            
		}

	</script>






	<div class="post_form" id="" >
		<div class="well">
			<h1 class="center">User Profile</h1>
			<div class="form-horizontal"  >

			  <div class="form-group">
				<div class="col-sm-12">
				 {{$user->email}}
				</div>
			  </div>

			  <div class="form-group">
				<div class="col-xs-6">
				  <input type="text" class="form-control" id="FirstName" name="FirstName" placeholder="First name" value="{{$user->name}}">
				</div>

				 <div class="col-xs-6">
				  <input type="text" class="form-control" id="LastName" name="LastName" placeholder="Last name" value="{{$user->last_name}}">
				</div>
			  </div>

			  
			  <div class="form-group">
		          <label for="location" class="col-sm-2 control-label">Location</label>
		          <div class="col-sm-10">
		            <select class="form-control" id="location_id" name="location_id">
		              @foreach ( $locations as $location )
		              	@if ($location->id == $user->location_id)
		              	<option value ="{{$location->id}}" selected> {{$location->name}} </option>
		              	@else
		                <option value ="{{$location->id}}" > {{$location->name}} </option>
		                @endif
		              @endforeach
		            </select>
		          </div>
	          </div>

			  <div class="form-group">
		          <label for="education" class="col-sm-2 control-label">Education</label>
		          <div class="col-sm-10">
		            <select class="form-control" id="education_id" name="education_id">
		              @foreach ( $educations as $education )
		              	@if ($education->id == $user->education_id)
		              	<option value ="{{$education->id}}" selected> {{$education->name}} </option> 
		              	@else
		                <option value ="{{$education->id}}" > {{$education->name}} </option> 
		                @endif
		              @endforeach
		            </select>
		          </div>
	          </div>

			  <div class="form-group">
		          <label for="classification" class="col-sm-2 control-label">Interest</label>
		          <div class="col-sm-5">
		            <select class="form-control" id="interest_classification_id" name="interest_classification_id" onchange="onSelectInterestChange()">
		              @foreach ( $classifications as $classification )
		              	@if ($classification->id == $user->interest_classification_id)
		              	<option value ="{{$classification->id}}" selected> {{$classification->name}} </option>
		              	@else
		              	<option value ="{{$classification->id}}" > {{$classification->name}} </option>
		              	@endif
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
				              <select class="form-control" 
				                      id=  "classification_skill_{{$classification_skill->id}}" 
				                      name="classification_skill_{{$classification_skill->id}}">
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
		         
		      </div>

			  <div class="form-group">
				<div class="col-xs-12">
				  <button type="submit" class="btn btn-primary" onClick="javascript:return validateRegistForm()">Create Account</button>
				</div>
			  </div>
			</div>
		</div>
	</div>
@endsection



