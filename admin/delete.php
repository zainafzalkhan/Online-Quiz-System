<?php
session_start();
include '../include.php';
include '../secure.php';
$size=sizeof($_POST);

$j=1;
for($i=1;$i<=$size; $i++,$j++)
{
$index="c".$j;
	if(isset($_POST[$index]))
	{
		$arr[$i]=$_POST[$index];
	}
	else
	{
		$i--;
	}
	

}
for($k=1;$k<=$size;$k++)
	{
		$q="DELETE from questions where q_id=".$arr[$k];
		$res=mysqli_query($cn,$q);
		if($res)
		echo "Successfully DELETED ;";
	}




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
						<h3 class="panel-title text-center">Delete Question of <strong><?php echo $_SESSION['cat_name']; ?></Strong> Category</h3>
						
					</div>
					<div class="panel-body" style="margin:25px;">
					
					
					<form id="f1" action="delete.php" method="POST">
			<table border="0px" class="table no-border" style="font-family:Lucida Fax;">
			<caption class="text-center"style="font-family:Lucida Fax;color:white; " >This Is The List Of All Qustions </caption>
				<?php
			
				$q="SELECT * FROM questions WHERE cat_id='".$_SESSION['s_cat']."'  ";
				$res=mysqli_query($cn,$q);
				$num=mysqli_num_rows($res);
				$_SESSION['num']=$num;
			
				for($i=1;$i<=$num;$i++)
				{
					$row=mysqli_fetch_array($res);
				
					
				?>
				
				
				<tr class="success text-center">
					<th class="text-center"><?php echo $i.".."."&nbsp; &nbsp;".$row['question']?></th>
				</tr>
				<tr class="info">
				
					<td>&nbsp;1&nbsp;&nbsp;<?php echo $row['opt1']?></td>
				
				</tr>
				<tr  class="info">
				
					<td>&nbsp;2&nbsp;&nbsp;<?php echo $row['opt2']?></td>
			
				</tr>
				<tr  class="info">
				
					<td>&nbsp;3&nbsp;&nbsp;<?php echo $row['opt3']?></td>
				
				</tr>
				<tr  class="info">
					<td>&nbsp;4&nbsp;&nbsp;<?php echo $row['opt4']?></td>
				
				</tr>
				<tr class="danger" class="text-center">
				<td> <input type="checkbox" name="c<?php echo $i?>" value="<?php echo $row['q_id']?>"/>&nbsp; Click Checkbox to Delete This Question</td> 
				</tr>
				

				<?php
				}
				
				?>
				
				
			</table> </br>
		
			<center><input type="submit" value="Delete" class="btn btn-default pull-center btn-lg"/></center>
			</form>
					
					
				
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
