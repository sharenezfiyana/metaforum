<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;500;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Home</title>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
<body>
    <style>
    .card-header{
        font-family: 'Poppins', sans-serif;
    }
    .rounded {
        border-radius: 0.25rem!important;
        padding: 10px 20px;
    }
    .header-forum{
        display:flex;
        flex-direction:row;
        align-items: center;
    }
    .viewing{
        padding: 10px 10px;
        border : 1px solid black;
        min-height: 300px;
    }
    .view-reply{
        margin :10px 50px;
        padding: 10px 10px;
        border : 2px solid black;
        min-height: 70px;
    }
    </style>
    <?php
    session_start();
    include("connect.php");
    $dblock = 'd-none';
 
    if (isset($_SESSION['username'])) {
        $disp = 'd-none';
        $dblock = 'd-block';
    }

    $postid = $_GET['id'];
    $sql3 = "SELECT * FROM forum_post a, forum_topic b, forum_category c WHERE a.topicid=b.topicid and b.categoryid=c.categoryid and postid='$postid' ";
    $query3 = mysqli_query($con,$sql3);

    $sql = "SELECT * FROM forum_post a, reply b where a.postid=b.postid";
    $query = mysqli_query($con,$sql);
    ?>
    <!-- HEADER NAVBAR -->
    <nav class="navbar navbar-light bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="images/logometaforums.png" alt=""  height="80">
            </a>
            <form class="d-flex">
                <a href="login.php"class="btn btn-outline-success me-3 <?php if(isset($disp))echo $disp; ?>">LOG IN</a>
                <a href="signup.php"class="btn btn-outline-success me-3 <?php if(isset($disp))echo $disp; ?>" >SIGN UP</a>
                <a href="logout.php" class="btn btn-outline-success me-3 <?php if(isset($dblock))echo $dblock; ?>" >LOG OUT</a>
            </form>
        </div>
    </nav>

    <div class="ckeditor" id="ckeditor">
        <div class="person">
            <div class="card rounded float-end" style="width: 18rem;">
                <img src="images/logometaforums.png" height="100"class="card-img rounded mx-auto d-block" alt="...">
                <div class="card-body">
                    <h5><?php if (isset($_SESSION['username'])) {
                        echo $_SESSION['username'];
                    } ?></h5>
                    <p class="card-text">Online</p>
                    <hr>
                    <div class="imagecard">
                        <img src="images/user (1).svg"alt="" srcset="">user
                        <br>
                        <img src="images/edit.svg"alt="" srcset="">user
                        <br>
                        <img src="images/log-out.svg"alt="" srcset="">user
                        <br>
                        <img src="images/power.svg"alt="" srcset="">user
                    </div>
                </div>
                    <a href="index.php" class="btn btn-primary">
                    <img src="images/arrow-left.svg"alt="" srcset=""></a>
            </div>
        </div> 
        <div class="card">
            <div class="card-header bg-danger"style="color:white;">
                View Thread
            </div>
            <div class="card-body">
                <form action="#" method="POST" name="postform" enctype="multipart/form-data">
                    <div class="viewing">
                        <?php
                        while($row=$query3->fetch_assoc()){
                            echo $row ['ckeditor'];
                        }
                        ?>
                    </div>
                </form>
                <a href="reply.php?postid=<?php echo $postid?>"><i class="fa fa-reply" aria-hidden="true" style="margin: 10px 10px;"></i></a>
                <i class="fa fa-heart-o" aria-hidden="true" style="margin: 10px 10px;"></i><i class="fa fa-ban" aria-hidden="true" style="margin: 10px 10px;"></i>
            </div>
            <div class="view-reply">
                <?php 
                    while($row=$query->fetch_assoc()){
                        if($row['postid']==$postid){
                            echo $row ['replytext'];
                        }

                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>