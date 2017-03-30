@extends('layout')


@section('content')



<div class="post_form">
    <h1 class="center">Post your job</h1>
    <form class="form-horizontal" id="myform" action="postjob" method="post">
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
                <option value ="1" >Sydney</option>
                <option value ="2" >Melbourne</option>
            </select>
        </div>
      </div>

      <div class="form-group">
        <label for="worktype" class="col-sm-2 control-label">Work type</label>
        <div class="col-sm-10">
            <select class="form-control" name="type_id">
                <option value ="1" >Full time</option>
                <option value ="2" >Part time</option>
            </select>
        </div>
      </div>

      <div class="form-group">
        <label for="classification" class="col-sm-2 control-label">Classification</label>
        <div class="col-sm-10">
            <select class="form-control" name="classification_id">
                <option value ="1" >IT</option>
                <option value ="2" >Accounting</option>
            </select>
        </div>
      </div>

      <input type="hidden" id="input_user_id" name="user_id" value="">

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Submit</button>
        </div>
      </div>
    </form>
</div>


<!--
<div class="panel-group col-md-6 col-sm-12" id="accordion" style="padding-left: 0">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    <i class="fa fa-plus"></i>
                    Add a New Job                </a>
            </h4>
        </div>

        <div id="collapseOne" class="panel-collapse collapse">
            <div class="panel-body">

                <form action="{{$base_url}}/job" method="post">

                    {{ csrf_field() }}

                    {!! \Nvd\Crud\Form::input('name','text')->show() !!}

                    {!! \Nvd\Crud\Form::input('company','text')->show() !!}

                    {!! \Nvd\Crud\Form::input('salary','text')->show() !!}

                    {!! \Nvd\Crud\Form::input('details','text')->show() !!}

                    {!! \Nvd\Crud\Form::input('location_id','text')->show() !!}

                    {!! \Nvd\Crud\Form::input('type_id','text')->show() !!}

                    {!! \Nvd\Crud\Form::input('classification_id','text')->show() !!}

                    {!! \Nvd\Crud\Form::input('user_id','text')->show() !!}

                    <button type="submit" class="btn btn-primary">Create</button>

                </form>

            </div>
        </div>



    </div>
</div>
-->


<script>
    function check_login_callback(is_login){
        if(is_login){

        }else{
            window.location = "./"; // redirect to home
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