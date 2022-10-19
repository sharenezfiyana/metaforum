<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;500;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Home</title>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <style>
        .imagecard img{
            margin-bottom: 5px;
            margin-right: 5px;
        }
        input[type=submit]{
            background-color: #150E56;
            text-decoration: none;
            border-radius: 5px;
            color: white;
            padding : 5px 10px;
            list-style: none;
            margin-top: 15px;
        }
        .card{
            height: 600px;
        }
    </style>
    <div class="ckeditor">
        <div class="person <?php if(isset($dblock))echo $dblock; ?>">
            <div class="card rounded float-end" style="width: 18rem;">
                <img src="images/logometaforums.png" height="100"class="card-img rounded mx-auto d-block" alt="...">
                <div class="card-body">

                <!-- <?php echo "<h5>Welcome, " . $_SESSION['username'] ."!". "</h5>"; ?>
                    -->
                    <h5>Rustic Key</h5>
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
                    <a href="#" class="btn btn-primary">
                    <img src="images/arrow-left.svg"alt="" srcset=""></a>
        </div>
    </div> 

    <div class="card">
            <div class="card-header bg-danger"style="color:white;">
                Reply to main post
            </div>
            <div class="card-body">
                <form action="#" method="POST" name="postform" enctype="multipart/form-data">
                    <table width="100%">
                        <tr>
                            <td><textarea class="ckeditor" id="ckedtor" name="isi"></textarea></td>
                        </tr>
                        <tr>
                            <td> </td>
                        </tr>
                        <tr>
                            <div class="submit-post">
                                <td><input type="submit" name="Submit" value="Submit" /></td>
                            </div>
                        </tr>
                    </table>
                </form>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            </div>
        </div>
    </div>
    
    <div class="person <?php if(isset($dblock))echo $dblock; ?>">
        <div class="card rounded float-end" style="width: 18rem;">
            <img src="images/logometaforums.png" height="100"class="card-img rounded mx-auto d-block" alt="...">
            <div class="card-body">

            <!-- <?php echo "<h5>Welcome, " . $_SESSION['username'] ."!". "</h5>"; ?>
                -->
                <h5>Rustic Key</h5>
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
                <a href="#" class="btn btn-primary">
                <img src="images/arrow-left.svg"alt="" srcset=""></a>
       </div>
   </div> 

   <div class="card">
        <div class="card-header bg-danger"style="color:white;">
            Reply to main post
        </div>
        <div class="card-body">
            <form action="#" method="POST" name="postform" enctype="multipart/form-data">
                <table width="100%">
                    <tr>
                        <td><textarea class="ckeditor" id="ckedtor" name="isi"></textarea></td>
                    </tr>
                    <tr>
                        <td> </td>
                    </tr>
                    <tr>
                        <div class="submit-post">
                            <td><input type="submit" name="Submit" value="Submit" /></td>
                        </div>
                    </tr>
                </table>
            </form>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        </div>
    </div>

</body>
</html>