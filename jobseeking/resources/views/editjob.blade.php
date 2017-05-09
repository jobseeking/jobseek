@extends('layout')


@section('content')


<style>
.post_form{
   
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
      <h1 class="center">Edit/View your job</h1>
      <form class="form-horizontal" id="myform" action="{{$base_url}}/api/updatejob/{{$job->id}}" method="post">
        
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
            <input type="text" class="form-control" name="name" value="{{$job->name}}">
          </div>
        </div>

        <div class="form-group">
          <label for="companyname" class="col-sm-2 control-label">Company name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="company" value="{{$job->company}}">
          </div>
        </div>

        <div class="form-group">
          <label for="salary" class="col-sm-2 control-label">Salary</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="salary" value="{{$job->salary}}">
          </div>
        </div>

        <div class="form-group">
          <label for="details" class="col-sm-2 control-label">Details</label>
          <div class="col-sm-10">
            <textarea class="form-control" name="details" rows="3" >{{$job->details}}</textarea>
          </div>
        </div>

        <div class="form-group">
          <label for="location" class="col-sm-2 control-label">Location</label>
          <div class="col-sm-10">
            <select class="form-control" name="location_id">
              @foreach ( $locations as $location )
                @if ($location->id == $job->location_id)
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
            <select class="form-control" name="education_id">
              @foreach ( $educations as $education )
                @if ($education->id == $job->education_id)
                <option value ="{{$education->id}}" selected> {{$education->name}} </option> 
                @else
                <option value ="{{$education->id}}" > {{$education->name}} </option> 
                @endif
              @endforeach
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="worktype" class="col-sm-2 control-label">Work type</label>
          <div class="col-sm-10">
            <select class="form-control" name="type_id">
              @foreach ( $types as $type )
                @if ($type->id == $job->type_id)
                <option value ="{{$type->id}}" selected> {{$type->name}} </option>     
                @else
                <option value ="{{$type->id}}" > {{$type->name}} </option>   
                @endif   
              @endforeach
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="classification" class="col-sm-2 control-label">Classification</label>
          <div class="col-sm-5">
            <select class="form-control" id="classification_id" name="classification_id" onchange="onSelectInterestChange()">
              @foreach ( $classifications as $classification )
                @if ($classification->id == $job->classification_id)
                <option value ="{{$classification->id}}" selected> {{$classification->name}} </option>
                @else
                <option value ="{{$classification->id}}" > {{$classification->name}} </option>
                @endif
              @endforeach   
            </select>
          </div>

          @foreach ( $classifications as $classification )
              @if ( $classification->id == $job->classification_id)
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
                    <option value ="0" 
                    @if ($job_skills_years[$classification_skill->id] == 0) 
                    selected 
                    @endif
                    > {{$classification_skill->name}} No Experience </option>
                    <option value ="1" 
                    @if ($job_skills_years[$classification_skill->id] == 1) 
                    selected 
                    @endif
                    > {{$classification_skill->name}} < 1 year </option>
                    <option value ="3" 
                    @if ($job_skills_years[$classification_skill->id] == 3) 
                    selected 
                    @endif        
                    > {{$classification_skill->name}} 1 ~ 3 years </option>
                    <option value ="5"
                    @if ($job_skills_years[$classification_skill->id] == 5) 
                    selected 
                    @endif
                    > {{$classification_skill->name}} 3 ~ 5 years </option>
                    <option value ="10"
                    @if ($job_skills_years[$classification_skill->id] == 10) 
                    selected 
                    @endif
                    > {{$classification_skill->name}} > 5 years </option>
                </select>
                  @endif
              @endforeach  
              </div> 
          @endforeach   

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
      var interest_classification_id = document.getElementById("classification_id").value;

      $(".skills_display").css({ display: "none"  });
      $(".skills_display").removeClass("skills_display");

      $("#classification_"+interest_classification_id+"_skill").css({ display: "block"  });
      $("#classification_"+interest_classification_id+"_skill").addClass("skills_display");

    }


    function check_login_callback(is_login){
        if(is_login){
           
        }else{
          
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