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

<body style="background-color:black;">
<!-- Add Header by include file-->
<?php require_once('user_header.html');?>

<div class="Row" style="padding-top:80px;">
<div class="col-sm-4 col-md-4"></div>

<div class="col-sm-4 col-md-4 panel panel-default text-center" >
              <div class="panel-heading">
                <h3 class="panel-title">Available Exams Information</h3>
              </div>
              <div class="panel-body" style="color:maroon;">
			  
			  <table border="2px" class="table " style="font-family:Lucida Fax;color:white; ">
			<caption class="text-center"style="font-family:Lucida Fax;color:white; " >This Is The List Of All Category</caption>
				<tr class="bg-info" style="color:black;">
					<th> <?php echo "Qus.No" ?></th>
					<th> <?php echo "Category Name" ?></th>
					<th><?php echo "Number Of Qustions In category" ?></th>
				</tr>
				
				<?php
				$q="select * from cat";
				$res=mysqli_query($cn,$q);
				$num=mysqli_num_rows($res);
			
				for($i=1;$i<=$num;$i++)
				{
					$row=mysqli_fetch_array($res);
					$c_id=$row['cat_id'];
					$qr="select * from questions where cat_id='$c_id' ";
					$re=mysqli_query($cn,$qr);
					$qnum=mysqli_num_rows($re);
					
					
				?>
				
				
				<tr>
				<td><?php echo $i; ?> </td>
				<td><?php echo $row['cat_name']; ?> </td>
				<td align="center"><?php echo $qnum;?> </td>
				</tr>
	
					

				<?php
				}
				
				?>
				
				
			</table>
			  
              
              </div>
</div>


<div class="col-sm-4 col-md-4">

</div>
</div>
</body>

</html>