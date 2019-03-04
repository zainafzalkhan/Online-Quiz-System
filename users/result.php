<?php 
session_start();
include "../include.php";
include "../secureUser.php";

			  $per=$_SESSION['percent'];
			 $right= $_SESSION['right'];
			 $noAttempt=$_SESSION['noAttempt'];
			 $wrong= $_SESSION['wrong'];
			 $num=$_SESSION['num'];

?>

<html>
<head>
<title>My-Account</title>
<link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.css">
<script src="../bootstrap/jquery-1.10.2.js"></script>
<script src="../bootstrap/bootstrap.js"></script>

</head>

<body style="background-color:black;">
<!-- Add Header by include file-->
<?php require_once('user_header.html');?>

<div class="Row" style="padding-top:80px;">
<div class="col-sm-2 col-md-2"></div>

<?php 
$user=$_SESSION['user_name'];
$q="select * from member where m_name='$user' ";
$result=mysqli_query($cn,$q) or die(mysql_error());
$row=mysqli_fetch_array($result);

?>
<div class="col-sm-8 col-md-8 panel panel-default text-center" >
              <div class="panel-heading">
                <h3 class="panel-title">Result</h3>
              </div>
              <div class="panel-body" style="color:white;">
			  
			  
			  <h3><b>Name: <?php echo $_SESSION['user_name'];?> </b></h3>
			
			  <h3><b>RESULT</b></h3>
			  <h4>Number Of Qustions</h4>
			  <p><?php echo $num; ?></p>
			  <hr></hr>
			  <h4>Attempt Questions</h4>
			  <p><?php echo $right+$wrong;?></p>
			  <hr></hr>
			  <h4>Right Answers</h4>
			  <p><?php echo $right;?></p>
			  <hr></hr>
			  <h4>Wrong Answers</h4>
			  <p><?php echo $wrong;?></p>
			  <hr></hr>
			  <h4>Percentage</h4>
			  <p><?php 
			  
			  print $per."%"; // round point ke baad 2 value show karane ke liye
			  
			  //echo $pr."%"; 
				function sugg($a)
				{
				if($a>=95)
				{
				echo "Good";
				}
				elseif($a<95 && $a>=60)
				{
				echo "Everage";
				}
				else
				{
				echo "Not good ";
				}
				
				}
			  
			  
			  ?>
			  
			  
			  </p>
			  <hr></hr>
			  <p><b><?php sugg($per);?></b></p>
			
				 <a href="answerkey.php"class="btn btn-success btn-lg pull-right">Answer</a>
			
			  
              
              
</div>


<div class="col-sm-2 col-md-2">

</div>
</div>
</body>

</html>