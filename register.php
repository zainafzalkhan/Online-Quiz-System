<?php
include "include.php";
$msg='';
$msgClass='';
// check button is set or not
if(isset($_POST['btnSubmit']))
{
    // filter valur from $POST global array
    $userName=$_POST['userName'];
    $userEmail=$_POST['userEmail'];
    $userPassword=$_POST['userPassword'];
    $type=$_POST['type'];
    $q1="SELECT * FROM memeber WHERE m_name='$userName' AND m_email='$userEmail' AND m_password='$userPassword'";
    $res=mysqli_query($cn,$q1);
    $isExist=mysqli_num_rows($res);
    if($isExist<1)
    {
    $q="INSERT INTO memeber VALUES('','$userName','$userPassword','$userEmail','$type')";
    $result=mysqli_query($cn,$q);
        if($result)
        {
            $msg="Thank You : ".$userName." Your Record Successfully Inserted ! Go <a href='login.php'>LOGIN </a> ";

            $msgClass="alert-success";
        }
        else{
            $msg="Record Insertion Failed ! Try Again  ";
            $msgClass="alert-danger alert-dismissible fade in";

            }
    }
    else{
        $msg="Record Already Exist ! Please Make Account With Another Data  ";
        $msgClass="alert-danger alert-dismissible fade in";
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--
        links for bootstrap css file and js jQoury files..
    -->
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/font-awesome.css">
    <link rel="stylesheet" href="bootstrap/global.css">
    <script src="bootstrap/jquery-1.10.2.js"></script>
    <script src="bootstrap/bootstrap.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>

    <title>Sign in</title>
</head>
<body>
    
    <div class="container-flued bg">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xl-12"></div>

            <div class="col-md-4 col-sm-4 col-xl-12">
                
            <!--Form start from here-->
            <form action="register.php" class="form-container" METHOD="POST">
            <div class="alert <?php if(isset($msgClass)){ echo $msgClass; } $msgClass=""; ?> ">

            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php if(isset($msg)){ echo $msg;} $msg=""; ?>
        
            </div>

                    <h1>SIGN-IN FORM</h1><hr>
                <div class="form-group">
                    <label for="">USER-NAME : </label>
                    <input type="text" class="form-control" name="userName" placeholder="Enter User Name" required>
                </div>

                <div class="form-group">
                    <label for="">EMAIL : </label>
                    <input type="email" class="form-control" name="userEmail" placeholder="Enter Email" required>
                </div>

                <div class="form-group">
                    <label for=""> SET PASSWORD: </label>
                    <input type="password" class="form-control" name="userPassword" placeholder="Enter Password" required>
                </div>
                <input type="hidden" name="type" value="student">

                <input type="submit" name="btnSubmit" class="btn btn-info btn-block" value="SIGN-IN" id="btnSign">
                <h4>If you Already Member Go To  </h4>
               <center> <a href="login.php" class="btn btn-success btn-link" style="border:1px solid #fff; text-decoration:none; color:white ">LOG-IN</a></center>
            </form>


            
            </div>

            <div class="col-md-4 col-sm-4 col-xl-12"></div>
        </div>
    </div>
    
</body>
</html>