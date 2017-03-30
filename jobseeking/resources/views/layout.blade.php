<!DOCTYPE html>
<html>
<head>
    <title>Laravel Sandbox</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

    <!--Rex-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!--Rex-->

    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

</head>
<body>



<!--Rex-->
<div class="container header">
    <div class="row">
        <div class="col-xs-4">
            <a href="index.html"><img class="logo img-responsive" src="{{ asset('images/logo.png') }}" alt=""></a>
        </div>

        <div id="login_link" class="col-xs-8 info" style="display:none;">
            <a href="login">Log in</a>
            or
            <a href="register">Register</a>
        </div>
        <div id="logout_link" class="col-xs-8 info" style="display:none;" >
            <a onclick="onClickLogout()" >Log out</a>
        </div>
    </div>

    <div class="row mynav">
        <a class="active" href="index.html">Home</a> |
        <a href="post.php">Post job</a> |
        <a href="find.php">Find job</a> |
        <a href="about.html">About us</a> |
        <a href="contact.php">Contact us</a>
    </div>
</div>
<!--Rex-->





<div class="container">
    <div class="content">
        @yield("content")
    </div>
</div>





<!--Rex-->
<div class="container footer">
    <hr>
    <a href="http://www.facebook.com" target="_blank"><img src="{{ asset('images/facebook.png') }}" alt=""></a>
    <a href="http://www.google.com" target="_blank"><img src="{{ asset('images/google.png') }}" alt=""></a>
    <a href="http://www.twitter.com" target="_blank"><img src="{{ asset('images/twitter.png') }}" alt=""></a>
    <a href="http://www.youtube.com" target="_blank"><img src="{{ asset('images/youtube.png') }}" alt=""></a>
</div>
<!--Rex-->




<script>

    var g_is_login = false;

    function onClickLogout(){
        console.log("onClickLogout");
        localStorage.removeItem("my_token");
        window.location = "./"; // redirect to home
    }

    function show_hide_login_out(is_login){
        if (!is_login){
            $("#login_link").css({ display: "block"});
            $("#logout_link").css({ display: "none"});
        }else{
            $("#login_link").css({ display: "none"});
            $("#logout_link").css({ display: "block"});
        }

        check_login_callback(is_login);
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
                                g_is_login = true;
                            }else{
                                localStorage.removeItem("my_token");
                            }
                      }
            }).done(function() {
                       console.log('api/authenticate/user : done');
                       show_hide_login_out(g_is_login);
                    })
              .fail(function(xhr, status, error) {
                    console.log('fail');
                    console.log(JSON.stringify(xhr));
                    console.log(JSON.stringify(status)); 
                    console.log(JSON.stringify(error)); 
                    localStorage.removeItem("my_token");
                    
               });
        }else{
            console.log("Token not exist.");
            show_hide_login_out(false);
        }



    });

 </script>




</body>
</html>