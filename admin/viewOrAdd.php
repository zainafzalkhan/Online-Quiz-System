<?php
session_start();
include '../include.php';
include '../secure.php';
$msg='';
if(isset($_POST['submit']))
{
$cat_name=$_POST['cat_name'];
$_SESSION['cat_name']=$cat_name;
$qu="select * from cat where cat_name='$cat_name'";
$dup=mysqli_query($cn,$qu);
$row=mysqli_fetch_array($dup);
	if($row)
	{
	$msg="This category is Already exist In Database";
	$msgClass="alert-danger";
	}


	else 
	{
		$q="INSERT into cat values ('','$cat_name')";
		$res=mysqli_query($cn,$q);
		if($res)
		{
			$msg="Your Category Name  Is successfuly Inserted";
			$msgClass="alert-success";
		}

	}
		
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
		<?php if($msg!=''):?>
		<div class="alert alert-dismissable <?php echo $msgClass;?>">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong><?php echo $msg; ?></strong> 
            </div>
			<?php endif; ?>
			
            <div class="row text-center"><div class="col-lg-3"></div>
			 
                <div class="col-lg-6">
                 <div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">View Or Add New Categories</h3>
						
					</div>
					<div class="panel-body" style="margin:25px;">
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
			<form action="viewOrAdd.php" method="POST">
						<div class="form-group input-group">
                            <span class="input-group-addon">Add New Exam Category </span>
                            <input type="text" name="cat_name" class="form-control" style="color:black"placeholder="Exam Category Name" required>
							<input value="Add" class="btn btn-info" type="submit" name="submit" />
                        </div>
						
			</form>
          </div>
        </div>
                        
         </div>
       </div>
				<div class="col-lg-3"></div>
   </div>
            
        </div>
    </div>
    <!-- /#wrapper -->

</body>
</html>
