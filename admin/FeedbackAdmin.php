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
				<?php 
										$q="SELECT * from feedback ";
										$res=mysqli_query($cn,$q);
										$num=mysqli_num_rows($res);
										
										for($i=1;$i<=$num;$i++)
										{

										$row=mysqli_fetch_array($res);
				?>
				
				
                 <div class="panel panel-info">
					<div class="panel-heading">
					    <h3 class="panel-title text-center">
                        Subject : <?php echo $row['subject']?>
                        </h3>
						
					</div>
					<div class="panel-body text-center" style="margin:25px;">
					    <h4 class="timeline-title">
                        UserName : <?php echo $row['sender']?>
                        </h4> 
                        <hr>
					    <span><i class="fa fa-clock-o fa-2x"></i> 
                        Date: <?php echo $row['f_date']?>
                        </span> 
                        <hr>
					    <p>
					    <h4>
                        Massege :
                        <h4><hr>
						<?php  echo $row['massege'];?>	
					    </p>
							
				   </div>
	
					
                 </div>
				 <?php }?>
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
