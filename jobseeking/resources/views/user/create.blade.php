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

                    <input type="hidden" id="input_token" value="">
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

    $('#myform').submit(function() {
        document.getElementById("input_token").value = localStorage.getItem("my_token");
        return true; // return false to cancel form action
    });

</script>

