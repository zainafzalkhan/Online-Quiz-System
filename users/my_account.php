<?php 
session_start();
include "../secureUser.php";
include "../include.php";


?>

<html>
<head>
<title>My-Account</title>
<link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.css">
<script src="../bootstrap/jquery-1.10.2.js"></script>
<script src="../bootstrap/bootstrap.js"></script>

</head>

<body style="background-color:gray;">
<!-- Add Header by include file-->
<?php require_once('user_header.html');?>

<div class="Row" style="padding-top:80px;">
<div class="col-sm-4 col-md-4"></div>



<div class="col-sm-4 col-md-4 panel panel-default text-center" >
              <div class="panel-heading">
                <h3 class="panel-title">User Profile</h3>
              </div>
              <div class="panel-body" style="color:#fff;">
               <h2>User Name</h2></br>
			   <h3> <?php  echo $_SESSION['user_name']; ?></h3></br></br>
			   
			    <h2>User Email</h2></br>
			   <h3><?php  echo  $_SESSION['user_email']; ?></h3></br></br>
			   
			    <h2>User Password</h2></br>
			   <h3> <?php echo  $_SESSION['user_password']; ?></h3></br></br>
              </div>
</div>


<div class="col-sm-4 col-md-4">

</div>
</div>
</body>

</html>