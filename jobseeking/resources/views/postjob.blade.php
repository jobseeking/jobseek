@extends('layout')


@section('content')


<style>
.post_form{
    display: none;
    position: relative;

    width: 60%;
    height: 70%;
    left: 20%; /* (100 - width)/2 */
    top: 15%;  /* (100% - height)/2 */
}

@media only screen and (max-width: 768px) {
    /* For mobile phones: */
    .post_form{
      width: 100%;
      height: 50%;
      left: 0%; /* (100 - width)/2 */
      top: 25%;  /* (100% - height)/2 */
  }
}

</style>


<div id="post_form_id" class="post_form" >
  <div class="well">
      <h1 class="center">Post your job</h1>
      <form class="form-horizontal" id="myform" action="{{$base_url}}/api/postjob" method="post">
        
        {{-- input error message --}}
        @if (count($errors) > 0)
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          </div>
        </div>
        @endif

        <div class="form-group">
          <label for="jobname" class="col-sm-2 control-label">Job name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="name" placeholder="Job name">
          </div>
        </div>

        <div class="form-group">
          <label for="companyname" class="col-sm-2 control-label">Company name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="company" placeholder="Company name">
          </div>
        </div>

        <div class="form-group">
          <label for="salary" class="col-sm-2 control-label">Salary</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="salary" placeholder="Salary">
          </div>
        </div>

        <div class="form-group">
          <label for="details" class="col-sm-2 control-label">Details</label>
          <div class="col-sm-10">
            <textarea class="form-control" name="details" rows="3"></textarea>
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
                <option value ="" > No Degree </option> 
                <option value ="" > Bachelor's Degree </option> 
                <option value ="" > Master's degree </option> 
                <option value ="" > Doctor's degree </option> 
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="worktype" class="col-sm-2 control-label">Work type</label>
          <div class="col-sm-10">
            <select class="form-control" name="type_id">
              @foreach ( $types as $type )
                <option value ="{{$type->id}}" > {{$type->name}} </option>            
              @endforeach
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="classification" class="col-sm-2 control-label">Classification</label>
          <div class="col-sm-5">
            <select class="form-control" id="classification_id" name="classification_id" onchange="onSelectInterestChange()">
              @foreach ( $classifications as $classification )
                <option value ="{{$classification->id}}" > {{$classification->name}} </option>
              @endforeach   
            </select>
          </div>

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
          <div class="col-sm-5" id = "skill_experience_2" style="display:none" >
            <select class="form-control" >
                <option value ="" > Audit No Experience </option>
                <option value ="" > Audit < 1 year </option>
                <option value ="" > Audit 1 ~ 3 years </option>
                <option value ="" > Audit 3 ~ 5 years </option>
                <option value ="" > Audit > 5 years </option>
            </select>
            <select class="form-control" >
                <option value ="" > Payroll No Experience </option>
                <option value ="" > Payroll < 1 year </option>
                <option value ="" > Payroll 1 ~ 3 years </option>
                <option value ="" > Payroll 3 ~ 5 years </option>
                <option value ="" > Payroll > 5 years </option>
            </select>
            <select class="form-control" >
                <option value ="" > Tax No Experience </option>
                <option value ="" > Tax < 1 year </option>
                <option value ="" > Tax 1 ~ 3 years </option>
                <option value ="" > Tax 3 ~ 5 years </option>
                <option value ="" > Tax > 5 years </option>
            </select>
          </div>

        </div>

        <input type="hidden" id="input_user_id" name="user_id" value="">


        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <!--   Use "<input>" instead for phpunit test
            <button type="submit" class="btn btn-primary">Submit</button>
            -->
            <input type="submit" value="Submit" class="btn btn-primary">
          </div>
        </div>

      </form>
  </div>
</div>





<script>

    function onSelectInterestChange(){
      var classification_id = document.getElementById("classification_id").value;

      if (classification_id == 1){
        $("#skill_experience_1").css({ display: "block" });
              $("#skill_experience_2").css({ display: "none"  });
      }else if (classification_id == 2) {
        $("#skill_experience_1").css({ display: "none" });
              $("#skill_experience_2").css({ display: "block"  });
      }
    }


    function check_login_callback(is_login){
        if(is_login){
            $("#post_form_id").css({ display: "block"});
        }else{
            alert("Please login to post a job.");
            window.location = "{{$base_url}}/login"; // redirect to home
        }
    } 

    //before form submit do something : 
    $('#myform').submit(function() {
        console.log("before submit");
        console.log("user id : " + g_user.id);
        document.getElementById("input_user_id").value = g_user.id;
        return true; // return false to cancel form action
    });

</script>


@endsection