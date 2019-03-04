<?php
session_start();
include '../secure.php';
include '../include.php';


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
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>ADMIN HONE</br><small>All Information</small></h1>
                    <div class="alert alert-dismissable alert-success">
                        <button data-dismiss="alert" class="close" type="button">&times;</button>
                        Welcome to the admin dashboard! Here You can manage the Working of Quiz Data  Like View,Insertion,Deletion,feedback
                        
                    </div>
				</div>
			</div>
		</div>
	<div class="container jumbotron">
		
			
			
		<div class="row text-center ">
			<div class="col-md-3">
				<div class="panel panel-primary">
				  <div class="panel-heading">
					<h3 class="panel-title">Totel Exam Categoris</h3>
				  </div>
				  <div class="panel-body">
					<?php
					 $q="SELECT * FROM cat";
				     $res=mysqli_query($cn,$q);
				     $num=mysqli_num_rows($res);
					echo $num; 
					?>
				  </div>
				</div>
			</div>
			
			<div class="col-md-3">
            <div class="panel panel-success">
              <div class="panel-heading">
                <h3 class="panel-title">Totel Questions</h3>
              </div>
              <div class="panel-body">
               <?php
					 $q="SELECT * FROM questions";
				     $res=mysqli_query($cn,$q);
				     $num=mysqli_num_rows($res);
					echo $num; 
					?>
              </div>
            </div>
			</div>
			
			<div class="col-md-3">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title">Registerd Users</h3>
              </div>
              <div class="panel-body">
                <?php
					 $q="SELECT * FROM member";
				     $res=mysqli_query($cn,$q);
				     $num=mysqli_num_rows($res);
					echo $num; 
					?>
              </div>
            </div>
			</div>
			<div class="col-md-3">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title">Totel FeedBack</h3>
              </div>
              <div class="panel-body">
                <?php
					 $q="SELECT * FROM feedback";
				     $res=mysqli_query($cn,$q);
				     $num=mysqli_num_rows($res);
					echo $num; 
					?>
              </div>
            </div>
			</div>
			
			
			
				
		</div><!--/.row-->
	</div>
					
					
   </div>
   </div>
            
 </div>
  
    <!-- /#wrapper -->

</body>
</html>
