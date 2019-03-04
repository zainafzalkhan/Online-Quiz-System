<?php
session_start();
include '../include.php';
include "../secureUser.php";

if(isset($_POST['s1']))
{

$_SESSION['s_cat']=$_POST['s_cat'];
$x=$_SESSION['s_cat'];

$q="SELECT * FROM cat WHERE cat_id='$x'";
$res=mysqli_query($cn,$q);
$num=mysqli_num_rows($res);
$r=mysqli_fetch_array($res);
    if($num==1)
    {
        $_SESSION['c_name']=$r['cat_name'];
        header("location:question.php"); 
    }
}


?>

<!DOCTYPE html>
<html>
<head>
<style>
.carousel-control.right, .carousel-control.left {
    background-image: none;
    color: #f4511e;
}

.carousel-indicators li {
    border-color: #f4511e;
}

.carousel-indicators li.active {
    background-color: #f4511e;
}

.item h4 {
    font-size: 19px;
    line-height: 1.375em;
    font-weight: 400;
    font-style: italic;
    margin: 70px 0;
}

.item span {
    font-style: normal;
}

</style>


<link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.css">
<script src="../bootstrap/jquery-1.10.2.js"></script>
<script src="../bootstrap/bootstrap.js"></script>
</head>
<body style="background-image:url('bg.jg'); background-color:black">
<!-- Add Header by include file-->
<?php require_once('user_header.html');?>


<div class="container jumbotron" style="background-color:rgba(255,255,255,0.1); margin-top:80px;">
<div class="label" align="center"><h3> SELECT CATEGARY </h3></div>
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
	<form action="start_exam.php" method="POST">
                <select name="s_cat" id="country" class="form-control">
				
								<?php
									    $sql="select * from cat" ; 
  										$result=mysqli_query($cn,$sql) or die(mysql_error());
  										$count=mysqli_num_rows($result);
											$i=0;
											for($i=0;$i<$count; $i++)
											{
												$opt=mysqli_fetch_array($result);
								?>
										
										<option value="<?php echo $opt['cat_id'];?>"> <?php echo $opt['cat_name']; ?></option>
												
								<?php
									}
											
								?>
                    
                </select>
				<center><input style="margin:20px;" type="submit" value="Start Quiz" name="s1" class="btn btn-success btn-lg"></center>
	</form>
            </div>  
	<div class="col-md-4"></div>
</div>
</div>
	
	

</body>
</html>