<?php
session_start();
include '../include.php';
include "../secureUser.php";


if(isset($_POST['sub']))
{

$cat_id=$_SESSION['s_cat'];
$num=$_SESSION['num'];
$user_id=$_SESSION['user_id'];
$user_name=$_SESSION['user_name'];
$cat_name=$_SESSION['c_name'];

	$q="SELECT * FROM questions WHERE cat_id='$cat_id' ";
	$res=mysqli_query($cn,$q);
	$num=mysqli_num_rows($res);
	$result=0;
	$wrong=0;
	$right=0;
	$noAttempt=0;
		for($i=1;$i<=$num;$i++)
		{
		$row=mysqli_fetch_array($res);
			if($row['ans']==$_POST[$row['q_id']])
			{
				$right++;
			}
			elseif($_POST[$row['q_id']]=="no")
			{
				$noAttempt++;
			}
			else{
				$wrong++;
			
			}
		
		
		}
		if($right+$wrong==0)
		{
			header('location:question.php');
		}
		else
		{
		
		$pr=($right*100)/$num; 
			  $per=round($pr,2);
			  if($per>90)
			  {
				$grade=1;
			  }
			  else{
				$grade=0;
			  }
			  $_SESSION['percent']=$per;
			  $_SESSION['right']=$right;
			  $_SESSION['noAttempt']=$noAttempt;
			  $_SESSION['wrong']=$wrong;
			 /* if($noAttempt==)
			  {
					echo "<script type='text/javascript'>alert('Hey');</script>";
			  }
			  */

			$que="insert into results values('$user_id','$user_name','$cat_name',$per,now(),$grade)";
			$s=mysqli_query($cn,$que);
			header('location:result.php');
		}// end of contion of submit
			
}




?>

<html>
<head>
 <style>

        div {
            padding-bottom:20px;
        }
		

    </style>

<script type="text/javascript">
var timeleft=<?php $cat_id = $_SESSION['s_cat'];

$x="select * from settime where cat_name='$cat_id' ";

$s=mysqli_query($cn,$x);
$row=mysqli_fetch_array($s);
echo $row['cat_time']*60;


?>;
function time()
{

	var min=Math.floor(timeleft/60);
	var sec=timeleft%60;
	if(timeleft<=0)
	{
	clearTimeout(tm)
	document.getElementById("f1").submit();
	
	}
	else
	{
	document.getElementById("t").innerHTML=min+":"+sec;
	
	}
	timeleft--;
	var tm=setTimeout(function(){ time()},1000);
	


}




</script>


<link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.css">
<script src="../bootstrap/jquery-1.10.2.js"></script>
<script src="../bootstrap/bootstrap.js"></script>

</head> 
<body style="background-color:black;" onload="time()">
<div class="container text-center" style="background-color:rgba(0,0,150,0.1);">


 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div>
	<div class="col-sm-4 col-md-8"  >
	<h1 style="float:center; color:white; font-family:Monotype Corsiva;">This is Quiz in  <?php echo $_SESSION['c_name']?></h1>
	</div>
	<div class="col-sm-4 col-md-2"   style=" font-family:DigifaceWide; float:center; color:white;" ><h1>TIME :</h1>
	</div>
	<div class="col-sm-4 col-md-2"  >
	<h1 id="t" style=" font-family:DigifaceWide; float:center; color:white;">Timeout</h1>
	</div>

</div>
</nav>
</div>

<div class="container jumbotron" style="background-color:rgba(20,20,20,0.5); padding-top:100px;">
<div class="row"> 
<div class="col-sm-2"></div>

<div class="col-sm-8">
<form id="f1" action="question.php" method="POST">
			<table border="0px" class="table no-border" style="font-family:Lucida Fax;">
				<?php
				
				$q="SELECT * FROM questions WHERE cat_id=1 ";
				$res=mysqli_query($cn,$q);
				$num=mysqli_num_rows($res);
				$_SESSION['num']=$num;
			
			for($i=1;$i<=$num;$i++)
			{
					$row=mysqli_fetch_array($res);
				
					
				?>
				
				
				<tr class="danger text-center">
					<th class="text-center"><?php echo $i.".."."&nbsp; &nbsp;".$row['question']; ?> </th>
				</tr>
				<tr class="info">
				<?php if(isset($row['q_id']))
				{?>
					<td>&nbsp;1&nbsp;<input type="radio" value='0' name="<?php echo $row['q_id']; ?>">&nbsp;<?php echo $row['opt1']?></td>
					
				<?php }?>
				</tr>
				<tr  class="info">
				<?php if(isset($row['q_id'])){?>
					<td>&nbsp;2&nbsp;<input type="radio" value='1' name="<?php echo $row['q_id']; ?>">&nbsp;<?php echo $row['opt2']?></td>
					<?php }?>
				</tr>
				<tr  class="info">
				<?php if(isset($row['q_id'])){?>
					<td>&nbsp;3&nbsp;<input type="radio" value='2' name="<?php echo $row['q_id']; ?>">&nbsp;<?php echo $row['opt3']?></td>
					<?php }?>
				</tr>
				<tr  class="info">
				<?php if(isset($row['q_id'])) {?>
					<td>&nbsp;4&nbsp;<input type="radio" value='3' name="<?php echo $row['q_id']; ?>">&nbsp;<?php echo $row['opt4']?></td>
					<?php }?>
				</tr>
				<tr>
				<td ><input style="display:none;" checked="checked" type="radio" value="no" name="<?php echo $row['q_id']; ?>" /> </td> </tr>
	
					

				<?php
				$noAttempt=0;
				if($row['q_id']=="no")
				{
					$noAttempt++;
				}
			}
				
				?>
				
				
			</table>
		
			<center><input type="submit" value="Submit" name="sub" class="btn btn-default pull-center btn-lg"  /></center>
			</form>
			</div>
			
			<div class="col-sm-2"></div>
	</div>

</div>
</body>

</html>