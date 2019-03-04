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
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

    </div>
      <div style="float:right;" class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="my_account.php">My Profile</a></li>
		 <li><a href="viewCat.php">Available Exams</a></li>
		  <li><a href="start_exam.php">Start_Exam</a></li>
		   <li><a href="results.php">Results</a></li>
		    <li><a href="feedback.php">Feedback</a></li>
			 <li><a href="logout.php">Log-Out</a></li>
        
      </ul>
      
    </div>
  </div>
</nav>
<div class="Row" style="padding-top:80px;">
<div class="col-sm-2 col-md-2"></div>

<?php 
$user=$_SESSION['user_name'];
$q="SELECT * FROM member WHERE m_name='$user' ";
$result=mysqli_query($cn,$q) or die(mysql_error());
$row=mysqli_fetch_array($result);

?>
<div class="col-sm-8 col-md-8 panel panel-default text-center" >
              <div class="panel-heading">
                <h3 class="panel-title">Answers</h3>
              </div>
              <div class="panel-body" style="color:maroon;">
			  
			  
			  <table border="2px" class="table " style="font-family:Lucida Fax;color:white; ">
			<caption class="text-center"style="font-family:Lucida Fax;color:white; " >This Is Answer Key Of <b><?php echo $_SESSION['c_name']?></b> Quiz </caption>
				<tr class="bg-info" style="color:black;">
					<th> <?php echo "Qus.No" ?></th>
					<th> <?php echo "Question" ?></th>
					<th><?php echo "Wright Answer" ?></th>
				</tr>
				
				<?php
				$q="SELECT * FROM questions WHERE cat_id='".$_SESSION['s_cat']."' ";
				$res=mysqli_query($cn,$q);
				$num=mysqli_num_rows($res);
				$_SESSION['num']=$num;
			
				for($i=1;$i<=$num;$i++)
				{
					$row=mysqli_fetch_array($res);
					$l=$row['ans'];
					$n=$l+1;
					$o="opt".$n;
					$m=$row[$o];
				
					
				?>
				
				
				<tr>
				<td><?php echo $i; ?> </td>
				<td><?php echo $row['question']; ?> </td>
				<td><?php echo "(".$n.")"."&nbsp;".$m;?> </td>
				</tr>
	
					

				<?php
				}
				
				?>
				
				
			</table>
		
			<center><a href="home.php" class="btn btn-default ">HOME</a></center>
			 
			
			  
              
              </div>
</div>


<div class="col-sm-2 col-md-2">

</div>
</div>
</body>

</html>