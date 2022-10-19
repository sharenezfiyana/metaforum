<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;500;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
</head>
<body>
    <?php

    include("connect.php");
    include("function.php");
    // include("function.php");

    $emailError = $usernameError=$passwordError=$confirmpasswordError="";
    $email=$username=$password=$confirmpassword="";
    $flag = 1;

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $email = $_POST['email'];
        $username = $_POST['username'];
		$password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];
        $token = md5(rand());

        $sql="SELECT *FROM register where email='$email'";
        $result = mysqli_query($con,$sql);
        $checkEmail = $result->num_rows;

        if(empty($_POST["email"])){
            $emailError = "Please enter your email.";
            $flag = 0;
        }else{
            $email = check_input($_POST["email"]);
        }
        if(!preg_match("/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/",$email)){
            $emailError = "Invalid email format.";
            $flag = 0;
        }if($checkEmail > 0 ){
            $emailError = "Sorry, that Email is already taken. Please choose another.";
            $flag = 0;
        }

        $sql="SELECT *FROM register where username='$username'";
        $result = mysqli_query($con,$sql);
        $checkUser = $result->num_rows;

        if(empty($_POST['username'])){
            $usernameError = "Please enter your username.";
            $flag = 0;
        }else{
            $username = check_input($_POST["username"]);
        }
        if(!preg_match("/^[A-Za-z0-9 _.-]+$/",$username)){
            $usernameError = "Enter a valid username.";
            $flag = 0;
        }
        if(strlen($username)<6||strlen($username)>20){
            $usernameError = "Username must be between 6 and 20 characters long.";
            $flag = 0;
        }
        if($checkUser > 0 ){
            $usernameError = "Sorry, that Username is already taken. Please choose another.";
            $flag = 0;
        }

        if(empty($_POST['password'])){
            $passwordError = "Please enter your password.";
            $flag = 0;
        }else{
            $password = check_input($_POST["password"]);
        }if(strlen($password)<8){
            $passwordError = "Password must be at least 8 characters long.";
            $flag = 0;
        }

        if(empty($_POST['confirmpassword'])){
            $confirmpasswordError = "Please enter your confirm password.";
            $flag = 0;
        }else{
            $confirmpassword = check_input($_POST["confirmpassword"]);
        }
        if($password!=$confirmpassword){
            $confirmpasswordError = "Password didn't match.";
            $flag = 0;
        }
        if($flag==1){
            
            $password = md5($_POST['password']);

            // sendVerificationEmail($username,$email,$token);
            $sql = "INSERT INTO register (email, username, password, confirmpassword, token) VALUES 
                ('$email','$username','$password','$confirmpassword','$token')";

            $result = mysqli_query($con, $sql);
            header('Location: login.php');
        }
    }

    function check_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    ?>
    <style>

        .form-design h3{
            /* text-align: center; */
            font-size: 18px;
            color: #8FD6E1;
            padding-top: 5px;
            padding-bottom: 20px;
        }
        .form-design {
            align-items: center;
            background-color: #150E56;
            z-index: 100;
            width: 40%;
            margin: 0 auto;
            align-items: center;
            border-radius: 10px;
            padding: 20px 70px;
            font-family: 'Poppins', sans-serif;
        }
        .form-label {
            margin-bottom: 0.7rem;
            color: white;
            font-size: 14px;
        }
        .form-control{
            width: 100%;
            margin: 0%;
        }
        .mb-3 {
         margin-bottom: 2rem !important;
        }
        .btn-primary{
            font-size: 13px;
        }
        .dropdown-item{
            color: white;
            font-size: 15px;
        }
        .dropdown-item:hover{
            background-color: transparent;
            font-weight: bolder;
            color: white;
        }
        .background-register{
            background-color: black;
            background-size: cover;
        }
        .wrapper-register{
            padding-top: 20px;
            padding-bottom: 55px;
        }
        @media only screen and (max-width: 800px){
            .dropdown-item{
                font-size: 12px;
            }
            .form-design h3{
                text-align: center;
                font-size: 17px;
            }
        }
        @media only screen and (max-width: 1250px){
            .form-design{
                width: 40%;
            }
        }
        .error{
            margin-top: 10px;
            color:red;
            font-size: 12px;
        }
        
        
    </style>
      <!-- HEADER NAVBAR -->
    <nav class="navbar navbar-light bg-dark">
        <div class="container">
            <a class="navbar-brand float-start" href="index.php">
                <img src="images/logometaforums.png" alt=""  height="80">
            </a>
            <form class="d-flex">
                <a href="login.php" class="btn btn-outline-success me-3 " >LOG IN</a>
                <a href="signup.php" class="btn btn-outline-success me-3">SIGN UP</a>
            </form>
        </div>
    </nav>

    <div class="background-register">
        <div class="wrapper-register">
            <div class="form-design">
                <div class="logo-register">
                        <img src="images/logometaforums.png" alt=""  height="50">
                    <h3>
                        Create your free account!
                    </h3>
                </div>
                <form id="form-register" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="mb-3 ">
                        <label for="exampleInputEmail1" class="form-label">Email </label>
                            <input type="text"  name="email" class="form-control" id="email" value="<?php echo $email;?>" aria-describedby="emailHelp">
                            <div class="error"></div>
                            <span class="error"><?php echo $emailError;?></span>
                    </div>
                    <div class="mb-3 ">
                        <label for="exampleInputEmail2" class="form-label">Username </label>
                            <input type="text"  name="username" class="form-control" id="username" value="<?php echo $username;?>" aria-describedby="emailHelp">
                            <div class="error2"></div>
                            <span class="error"><?php echo $usernameError;?></span>
                    </div>
                    <div class="mb-3">
                            <label for="exampleInputPassword4" class="form-label">Password</label>
                            <input type="password"  name="password"class="form-control" value="<?php echo $password;?>"id="password">
                            <div class="error4"></div>
                            <span class="error"><?php echo $passwordError;?></span>
                    </div>
                    <div class="mb-3">
                            <label for="exampleInputPassword5" class="form-label">Confirm Password</label>
                            <input type="password"   name="confirmpassword"class="form-control" value="<?php echo $confirmpassword;?>"id="confirmpassword">
                            <div class="error5"></div>
                            <span class="error"><?php echo $confirmpasswordError;?></span>
                    </div>
                    <input id="button" class="btn btn-primary "name="submit" type="submit" value="Submit">
                </form>
                <div class="dropdown-divider"></div>
                    <span class="dropdown-item">Already have an account? <a href="login.php">Log in</a></span>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script>
    if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
    }
    </script>
</body>
</html>