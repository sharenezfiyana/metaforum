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
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    session_start();

    include("connect.php");
    error_reporting(0);
    if (isset($_SESSION['register'])) {
        header("Location: index.php");
    }
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        // $username = $_POST['email'];
        $password = md5($_POST['password']);
        
        if(preg_match("/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/",$email)){
            $sql = "SELECT * FROM register WHERE email='$email' AND password='$password'";
            $result = mysqli_query($con, $sql);
            echo $result->num_rows;
            if($result->num_rows > 0){
                $row = mysqli_fetch_assoc($result);
                $_SESSION['username'] = $row['username'];
                header("Location: index.php");
            }
            else {
                echo "<script>alert('Wrong Email/Username or Password, please try again!')</script>";
            }
        }

        else{
            $sql = "SELECT * FROM register WHERE username='$email' AND password='$password'";
            $result = mysqli_query($con, $sql);
            echo $result->num_rows;
            echo $password;
            if($result->num_rows > 0){
                $row = mysqli_fetch_assoc($result);
                $_SESSION['username'] = $row['username'];
                header("Location: index.php");
            }
            else {
                echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
            }
        }   
    }
    
    ?>
    <style>
        .form-design h3{
            text-align: center;
            font-size: 20px;
            color: white;
            padding-bottom: 10px;
        }
        .form-design {
            align-items: center;
            background-color: #150E56;
            z-index: 100;
            width: 25%;
            margin: 0 auto;
            align-items: center;
            border-radius: 10px;
            padding: 20px 30px;
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
        .dropdown-item{
            color: white;
            font-size: 15px;
        }
        .dropdown-item:hover{
            background-color: transparent;
            font-weight: bolder;
            color: white;
        }
        .mb-3 {
         margin-bottom: 2rem !important;
        }
        .btn-primary{
            font-size: 13px;
        }
        .background-login{
            background-color: black;
            background-size: cover;
        }
        .wrapper-login{
            padding-top: 100px;
            padding-bottom: 115px;
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

    </style>
    <!-- HEADER NAVBAR -->
    <nav class="navbar navbar-light bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="images/logometaforums.png" alt=""  height="80">
            </a>
            <form class="d-flex">
                <a href="login.php" class="btn btn-outline-success me-3 " >LOG IN</a>
                <a href="signup.php" class="btn btn-outline-success me-3">SIGN UP</a>
            </form>
        </div>
    </nav>

    <div class="background-login">
        <div class="wrapper-login">
            <div class="form-design">
                <h3>
                    Log in to your account
                </h3>
                <form id="login-form" method="POST">
                    <div class="mb-3 ">
                        <label for="exampleInputEmail1" class="form-label">Email or Username </label>
                            <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password"class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" name="login" class="btn btn-primary">Submit</button>
                </form>
                <div class="dropdown-divider"></div>
                    <span class="dropdown-item">Don't have an account? <a href="signup.php">Sign up</a></span>
                    <a class="dropdown-item" href="forgotpassword.php">Forgot password?</a>
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