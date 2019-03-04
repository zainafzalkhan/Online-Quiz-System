<?php 
session_start();
include "../include.php";
include "../secureUser.php";


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
<div class="col-sm-4 col-md-4"></div>

<?php 
$user=$_SESSION['user_name'];
$q="select * from member where m_name='$user' ";
$result=mysqli_query($cn,$q) or die(mysql_error());
$row=mysqli_fetch_array($result);

?>
<div class="col-sm-4 col-md-4 panel panel-default text-center" >
              <div class="panel-heading">
                <h3 class="panel-title">Results</h3>
              </div>
              <div class="panel-body" style="color:white;">
			  
			  <table class="table" border="3px">
			  
			  <h3 class="info" >Name : <?php echo $user;?></h3>
			  
	<tr  class="info" >
		<th>Exam-Date</th>
		<th>Exam-Name</th>
		<th>Marks(%)</th>
	</tr>
	<?php 
	//include "include.php";
	$q="select* from results where user_name='$user'";
	$result=mysqli_query($cn,$q);
	$num=mysqli_num_rows($result);
	for($i=1;$i<=$num;$i++)
	{ 
	
	$row=mysqli_fetch_array($result);
	?>
	<tr class="success">
		<td><?php echo $row['exam_date'];?></td>
		<td><?php echo $row['exam_name'];?></td>
		<td><?php echo $row['marks']."%";?></td>
	</tr>
	
	<?php }?>

</table>
			  
              
              </div>
</div>


<div class="col-sm-4 col-md-4">

</div>
</div>
</body>

</html>