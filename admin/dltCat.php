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
		$q="DELETE from cat where cat_id=".$arr[$k];
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
            <div class="row text-center"><div class="col-lg-3"></div>
                <div class="col-lg-6">
                 <div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Choose Categories And Questions To Delete</h3>
					</div>
					<div class="panel-body" style="margin:25px;">
					
					
					<form action="dltCat.php" method="POST">
			<table border="2px" class="table " style="font-family:Lucida Fax;color:white; ">
			<caption class="text-center"style="font-family:Lucida Fax;color:white; " >This Is The List Of All Category</caption>
				<tr class="bg-info" style="color:black;">
					<th> <?php echo "Category.No" ?></th>
					<th> <?php echo "Category Name" ?></th>
					<th><?php echo "Select to DELETE" ?></th>
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
				<td align="center"> <input type="checkbox" name="c<?php echo $i?>" value="<?php echo $row['cat_id']?>"/> </td>
				</tr>
	
					

				<?php
				}
				
				?>
		
				
			</table>
			<center><input type="submit" value="DELETE" class="btn btn-default pull-center btn-lg"/></center>
			
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
