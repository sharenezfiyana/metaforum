<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;500;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>
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
    /* .background-login{
        background-color: black;
        background-size: cover;
    } */
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
<?php 
  
?>
    <div class="background-login">
        <div class="wrapper-login">
            <div class="form-design">
                <h3>
                    Recover your Password
                </h3>
                <form id="forgotPassword" action="forgotpassword.php" method="POST">
                    <div class="mb-3 ">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                        <a type="submit" name="forgot-password" class="btn btn-primary">Submit</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>