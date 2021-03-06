<div class="panel-group col-md-6 col-sm-12" id="accordion" style="padding-left: 0">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    <i class="fa fa-plus"></i>
                    Add a New User                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse">
            <div class="panel-body">

                <form id="myform" action="{{$base_url}}/user" method="post">

                    {{ csrf_field() }}

                    {!! \Nvd\Crud\Form::input('name','text')->show() !!}

                    {!! \Nvd\Crud\Form::input('email','text')->show() !!}

                    {!! \Nvd\Crud\Form::input('password','text')->show() !!}

                    {!! \Nvd\Crud\Form::input('remember_token','text')->show() !!}

                    {!! \Nvd\Crud\Form::input('last_name','text')->show() !!}

                    {!! \Nvd\Crud\Form::input('interest_classification_id','text')->show() !!}

                    {!! \Nvd\Crud\Form::input('interest_classification_id_2','text')->show() !!}

                    {!! \Nvd\Crud\Form::input('interest_classification_id_3','text')->show() !!}

                    <input type="hidden" id="post_token_id" name="post_token" value="">
                    <button type="submit" class="btn btn-primary">Create</button>

                </form>

            </div>
        </div>
    </div>
</div>


<script>
    function check_login_callback(is_login){
        console.log(" create user : check_login_callback : " + is_login);
           
    } 

    //before form submit do something : 
    $('#myform').submit(function() {
        console.log("before submit");
        console.log(localStorage.getItem("my_token"));
        // Attach token to http post parameter
        document.getElementById("post_token_id").value = localStorage.getItem("my_token");
        return true; // return false to cancel form action
    });

</script>

