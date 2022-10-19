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
    <title>Home</title>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
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
    .thread{
        margin-top: 10px;
    }
    .nav-link  :hover{
        color: black;
    }
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
    .form-label{
        font-weight: bold;
    }
    .nav-link:focus, .nav-link:hover {
        color: white;
        background-color: rgb(11, 94, 215);
    }
    .row-category{
        font-family: sans-serif;
        font-size: 15px;
    }
    .row-category:hover{
        background-color: rgb(236, 236, 236);
    }
    .table>:not(caption)>*>* {
        padding: 0.8rem 0.5rem;
    }
    .post-isi{
        color: rgb(147, 142, 141);
    }
    .post-text{
        color: rgb(11, 94, 215);
    }
    .post-gambar img{
        margin-right: 5px;
        margin-left: 5px;
    }
    .post-gambar{
        color: rgb(147, 142, 141);
    }
    .btn-light{
        border-radius: 0;
        padding: 8px 10px;
    }
    .btn-light :hover{
        background-color: black;
    }
    .p-3 {
         padding: 0 !important;
    }
    .btn-group-vertical :hover{
        background-color: rgb(11, 94, 215);
        color: white;
    }
    .active{
        background-color: rgb(11, 94, 215) !important;
        color: white !important;
        font-weight: bold;
    }
    .ckeditor{
        display: none;
    }
    .rounded{
        height: 532px;
    }
    .text-truncate p{
        overflow: hidden;
        max-width: 526px;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .text-truncate{
        max-height: 30px;
    }
    .post-text a{
        text-decoration: none;
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
    $sql = "SELECT * FROM forum_category";
    $query = mysqli_query($con,$sql);

    $sql2 ="SELECT * FROM forum_topic a , forum_category b where a.categoryid=b.categoryid";
    $query2 = mysqli_query($con,$sql2) or die($con->error);

    $sql3 = "SELECT * FROM forum_post a, forum_topic b, forum_category c WHERE a.topicid=b.topicid and b.categoryid=c.categoryid";
    $query3 = mysqli_query($con,$sql3);
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $topicsid = $_POST['select-topic'];
        if(isset($_POST['submitpost'])){
        $username = $_SESSION['username'];
        $ckeditor = $_POST['ckeditor'];
        $sql = "INSERT INTO forum_post (ckeditor,topicid,username) values ('$ckeditor','$topicsid','$username')";
        $result = mysqli_query($con, $sql);
        header('Location: index.php');
        }
    }
   
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
    
        
    <!-- category  -->
    <div id="categoryckeditor" class="card text-center sticky-top">
        <div class="card-header">
            <ul class="nav nav-pills card-header-pills">
            <?php
            while ($row = $query->fetch_assoc()){
                echo'<li class="nav-item"><button class="nav-link" id="';
                echo $row['categoryname'];
                echo '" href="#">';
                echo $row['categoryname'];
                echo '</button></li>';
            }
            ?>
            </ul>
        </div>
    </div>

 

    <div id="topikckeditor" class="btn-group-vertical w-25 p-3 float-start" role="group" aria-label="Button group with nested dropdown">
        <?php
            while ($row = $query2->fetch_assoc()){
                echo '<button class="btn btn-light ';
                echo $row['categoryname'];
                echo '"id="';
                echo $row['topicname'];
                echo '">';
                echo $row['topicname'];
                echo '</button>';
            }
        ?>
    </div>


    <div class="thread float-end" id="create-thread" style="margin-right: 10px;">
        <a  style="margin-bottom: 10px; width:142px; float:right; margin-left:10px;" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary <?php if(isset($dblock))echo $dblock; ?>" >Create Thread</a>
        <hr class="float-start" width="970">
    </div>

    
    <!-- post -->
    <form action="" method="get">
        <table id="postckeditor" class="table table-hover w-75 p-3 float-end post-metaforum">
            <tbody>
                <?php
                while($row=$query3->fetch_assoc()){
                    echo '<tr class="row-post ';
                    echo $row['topicname'];
                    echo '">';
                    echo '<td class="post-isi">[HOT]</td>';
                    echo '<td class="post-text d-block" style="max-width:"300px; min-width:"300px;" >';
                    echo '<a class="wordwrap d-inline-block text-truncate" name="id" href="viewthread.php?id='.$row['postid'].'">'.$row['ckeditor'].'</a>';
                    echo '<td class="post-isi">by '. $row['username'].'</td>';
                    echo '<td class="post-gambar"><img src="images/eye.svg" alt="" srcset="">103<img src="images/message-circle.svg" alt="" srcset="">9</td>';
                    echo '<td class="post-isi">';
                    echo $row['createpost'];
                }
                ?>
            </tbody>
        </table>
    </form>

    <!-- ckeditor -->
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
                Creating Thread
            </div>
            <div class="card-body">
                <form action="#" method="POST" name="postform" enctype="multipart/form-data">
                    <table width="100%">
                        <tr>
                            <td><textarea class="ckeditor" id="ckeditor" name="ckeditor"></textarea></td>
                        </tr>
                        <tr>
                            <td> </td>
                        </tr>
                        <tr>
                            <div class="col-md-4">
                                <label for="inputState" class="form-label">Choose Category</label>
                                <select name="select-topic" id="inputState" class="form-select">
                                    <option value="108"> PRAISE </option>
                                    <option value="109"> RELIGION </option>
                                    <option value="110"> HEALTH </option>
                                    <option value="111"> CULTURE </option>
                                    <option value="112"> LITERATURE </option>
                                    <option value="114"> MUSIC </option>
                                    <option value="115"> MOVIES & TV </option>
                                    <option value="116"> MOBA </option>
                                    <option value="117"> RPG </option>
                                    <option value="118"> FIRST-PERSON SHOOTER </option>
                                    <option value="120"> INTERNATIONAL </option>
                                    <option value="121"> NATIONAL </option>
                                    <option value="122"> JOB OFFERS </option>
                                    <option value="123"> SOFTWARE & IOS </option>
                                    <option value="124"> OTHERS </option>
                                </select>
                                <br>
                            </div>
                            <div class="submit-post">
                                <td><input type="submit" name="submitpost" value="Submit" /></td>
                            </div>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <!-- reply -->
</body>
    <script src="javascript/function.js"></script>
    <script src="javascript/function2.js"></script>
    <script src="javascript/function3.js?ver=1"></script>
</html>