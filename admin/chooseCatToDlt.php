<?php

session_start();
include '../include.php';
include '../secure.php';
if(isset($_POST['queByCat']))
{
$x=$_POST['s_cat'];
$_SESSION['s_cat']=$_POST['s_cat'];
$q="SELECT cat_name FROM cat WHERE cat_id='$x'";
$res=mysqli_query($cn,$q);
$r=mysqli_fetch_array($res);
$_SESSION['cat_name']=$r['cat_name'];

header("location:delete.php");
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
					<form action="chooseCatToDlt.php" method="POST">
					
						<a class="btn btn-success" href="dltCat.php">View All Quiz Categries<a/><br> </br>
					
						<select name="s_cat" id="country" class="form-control" style="color:black; margin:20px;">
				
								<?php
									    $sql="SELECT * FROM cat" ; 
  										$result=mysqli_query($cn,$sql) or die(mysql_error());
  										$count=mysqli_num_rows($result);
											$i=0;
											for($i=0;$i<$count; $i++)
											{
												$opt=mysqli_fetch_array($result);
								?>

										<option  value="<?php echo $opt['cat_id'];?>"> <?php echo $opt['cat_name']; ?></option>
												
								<?php
									}
											
								?>
                    
						</select>
							<input type="submit" class="btn btn-success"name="queByCat" value="Delete Questions By Categries" />
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
