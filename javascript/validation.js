$(document).ready(function(){
    $("button").click(function(e){
        e.preventDefault();
        var $email = $("#email").val();
        var $username = $("#username").val();
        var $phonenumber = $("#phonenumber").val();
        var $password =  $("#password").val();
        var $confirmpassword =  $("#confirmpassword").val();
        var flag = 1
        var regexEmail=/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var validateEmail = regexEmail.test($email);

        // $(".error").();
        if($email.length<1){
            $(".error").html("Please enter your email");
            flag = 0;
        }
        else if(!validateEmail){
            // var regexEmail=/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            // var validateEmail = regexEmail.test($email);
            // if(!validateEmail){
            $(".error").html("Enter a valid email");
            flag=0;
        }
        else{
            $(".error").html("");
        }
        if($username.length<1){
            $(".error2").html("Please enter your username");
            flag=0;
        }
        else if($username.length>6 && $username.length<20){
            $(".error2").html("Username must be between 6 and 20 characters long");
            flag=0;
        }
        else {
            var regexUsername = /^[A-Za-z0-9 _.-]+$/;
            var validateUsername = regexUsername.test($username);
            if(!validateUsername){
                $(".error2").html("Enter a valid username");
                flag=0;
            }
        }
        if($phonenumber.length<1){
            $(".error3").html("Please enter your phonenumber");
            flag=0;
        }
        else{
            var regexPhone = /^[0-9-+]+$/;
            var validatePhone = regexPhone.test($phonenumber);
            if(!validatePhone){
                $(".error3").html("Enter a valid phonenumber");
                flag=0;
            }
        }
        if($password.length<1){
            $(".error4").html("Please enter your password");
            flag=0;
        }
        else if($password.length<8){
            $(".error4").html("Password must be at least 8 characters long");
            flag=0;
        }
        if($password!=$confirmpassword){
            $(".error5").html("Password didn't match");
            flag=0;
        }
        else if($password.length<1){
            $(".error5").html("Please enter your confirm password");
            flag=0;
        }

        if(flag==1){
            return true;
        }
    })

});