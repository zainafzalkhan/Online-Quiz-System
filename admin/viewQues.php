<?php
session_start();
include '../include.php';
include '../secure.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Dark Admin</title>

   <?php include 'design.html';?>
</head>
<body>
    <div id="wrapper">
    <?php require_once('index_header.html');?>

        <div id="page-wrapper">
		
         <div class="row "><div class="col-lg-2"></div>
			 
                <div class="col-lg-8">
                 <div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title text-center">View Question of <strong><?php echo $_SESSION['cat_name']; ?></Strong> Category</h3>
						
					</div>
					<div class="panel-body" style="margin:25px;">
					
					
					<table border="0px" class="table no-border" style="font-family:Lucida Fax; marging-top:10%;">
				<?php
				$q="SELECT * FROM questions WHERE cat_id='".$_SESSION['s_cat']."' ";
				$res=mysqli_query($cn,$q);
				$num=mysqli_num_rows($res);
				$_SESSION['num']=$num;
			
				for($i=1;$i<=$num;$i++)
				{
					$row=mysqli_fetch_array($res);
				
					
				?>
				
				
				<tr class="info text-center">
					<th class="text-center"><?php echo $i.".."."&nbsp; &nbsp;".$row['question']?></th>
				</tr>
				<tr>
					<td>&nbsp;1&nbsp;<input type="radio">&nbsp;<?php echo $row['opt1']?></td>
				</tr>
				<tr >
				
					<td>&nbsp;2&nbsp;<input type="radio">&nbsp;<?php echo $row['opt2']?></td>
				
				</tr>
				<tr >
			
					<td>&nbsp;3&nbsp;<input type="radio">&nbsp;<?php echo $row['opt3']?></td>
		
				</tr>
				<tr  >
		
					<td>&nbsp;4&nbsp;<input type="radio" >&nbsp;<?php echo $row['opt4']?></td>
				</tr>
			
	
					

				<?php
				}
				
				?>
				
				
			</table>
          </div>
        </div>
                        
         </div>
       </div>
				<div class="col-lg-2"></div>
   </div>
            
        </div>
    </div>
    <!-- /#wrapper -->

</body>
</html>
