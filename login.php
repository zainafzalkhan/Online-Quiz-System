<?php
session_start();
include 'include.php';
if(isset($_POST['btnLogin']))
{

	
	// Define $myusername and $mypassword 
	$myusername=$_POST['userName']; 
	$mypassword=$_POST['userPassword'];

	
	
	// To protect MySQL injection (more detail about MySQL injection)
	
	$sql="SELECT * FROM member WHERE m_name='$myusername' AND m_password='$mypassword'";
	$result=mysqli_query($cn,$sql);
	
	$row=mysqli_fetch_array($result);
	
	// Mysql_num_row is counting table row
	$count=mysqli_num_rows($result);
	// If result matched $myusername and $mypassword, table row must be 1 row
	
	if($count==1)
	{
		
		session_start();
	
		$_SESSION['user_name']= $row['m_name']; 
		$_SESSION['user_id']=$row['u_id'];
		$_SESSION['user_email']=$row['m_email'];
		$_SESSION['user_password']=$row['m_password'];

        if($row['u_type']=='admin')
        {
            $_SESSION['admin']=$row['u_type'];
            header("location:admin/index.php");
        }else{
            header("location:users/my_account.php");
        }
	}
	else 
	{
	
			$msg = "Invalid Login. Please try again with correct user name and password. ";
			$msgClass="alert-danger";
			header("Location:login.php");
	
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

    <title>Log-in page</title>
</head>
<body >
    
    <div class="container-flued bg">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xl-12"></div>

            <div class="col-md-4 col-sm-4 col-xl-12">
                
            <!--Form start from here-->
            <form action="login.php" class="form-container" METHOD="POST">
            <div class="alert <?php 
                                if(isset($msgClass))
                                { 
                                    echo $msgClass; 
                                } 
                                    $msgClass=""; 
                                ?> ">

            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <?php if(isset($msg)){ echo $msg;} $msg=""; ?>
        
            </div>
                <h1>Log-In Form</h1><hr>
                <div class="form-group">
                    <label for="">UserName : </label>
                    <input type="text" class="form-control" name="userName" placeholder="Enter User Name" required />
                </div>

                <div class="form-group">
                    <label for="">Password : </label>
                    <input type="password" class="form-control" name="userPassword" placeholder="Enter Password" required/>
                </div>

                <div class="checkbox">
                    <label for="">
                        <input type="checkbox" name="remeber"> Remember Me 
                    </label>
                </div>
                <input type="submit" class="btn btn-success btn-block" name="btnLogin" value="Login">
                <h4>IF YOU ARE A NEW MEMBER THEN FIRST GO TO REGISTER:</h4>
                <center> <a href="register.php" class="btn btn-success btn-link" style="border:1px solid #fff; text-decoration:none; color:white; ">Register</a></center>

            </form>

            </div>

            <div class="col-md-4 col-sm-4 col-xl-12"></div>
        </div>
    </div>
    
</body>
</html>
