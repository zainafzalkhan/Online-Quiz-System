<?php

session_start();
include '../include.php';
include '../secure.php';

if(isset($_POST['BtnLogin']))
{
	$SESSION['time']=$_POST['setBox'];
	$c=$_POST['s_cat'];
	$t=$SESSION['time'];
	$q="UPDATE settime SET cat_time=$t WHERE cat_name=$c";
	$res=mysqli_query($cn,$q);
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
						<h3 class="panel-title">Set Different Timer For Different Categories</h3>
					</div>
					<div class="panel-body" style="margin:25px;">
					<form role="form"   name="form1" method="post" action="setTImer.php" >
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Enter Time in Minutes" name="setBox" type="text" autofocus="">
							</div>
							<div class="form-group">
								<select name="s_cat" id="country" class="form-control">
				
								<?php
									    $sql="SELECT * FROM cat" ; 
  										$result=mysqli_query($cn,$sql) or die(mysql_error());
  										$count=mysqli_num_rows($result);
											$i=0;
											for($i=0;$i<$count; $i++)
											{
												$opt=mysqli_fetch_array($result);
								?>
										
										<option class="form-control" value="<?php echo $opt['cat_id'];?>"> <?php echo $opt['cat_name']; ?></option>
												
								<?php
									}
											
								?>
                    
                </select>
							</div>
							<input type="Submit" value="SET" name="BtnLogin" class="btn btn-success">
							
							</fieldset>
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
