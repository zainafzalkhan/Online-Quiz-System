<?php
session_start();
include '../secure.php';
include '../include.php';

$msg="";

if(isset($_POST['sub']))
{
extract($_POST);
$question=htmlentities($question);
$opt1=htmlentities($opt1);  /* htmlentities entities like <>,$,#,<,%,<, ko convert krke manage karta h @ */
$opt2=htmlentities($opt2);
$opt3=htmlentities($opt3);
$opt4=htmlentities($opt4);
$ans=htmlentities($ans);	

$arr=array($opt1,$opt2,$opt3,$opt4); //indx[0,1,2,3,]
$answer=array_search($ans,$arr);  // ye compare karta he ki ans wala text option ke konse index se match kar raha h
$s_cat=$_POST['s_cat'];
$q="INSERT INTO questions (q_id,question,opt1,opt2,opt3,opt4,ans,cat_id)
VALUES('','$question','$opt1','$opt2','$opt3','$opt4','$answer',$s_cat)";
$resutl=mysqli_query($cn,$q);
if($resutl==1)
{
	$msg="Your question Is successfuly Inserted";
	$msgClass="alert-success";
}
else
{
	$msg="Not Inserted";
	$msgClass="alert-danger";
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
	
	 <style>

        div {
            padding-bottom:20px;
        }
		.form-control
		{
		color:black;
		
		}

    </style>

</head>
<body>
    <div id="wrapper">
	
	
	<?php if($msg!=''):?>
            <div class="alert alert-dismissable <?php echo $msgClass;?>">
            
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong><?php echo $msg; ?></strong> 
              
            </div>
	<?php endif; ?>
	
	
         <?php require_once('index_header.html');?>

        <div id="page-wrapper">
		
         <div class="row "><div class="col-lg-1"></div>
			 
                <div class="col-lg-10">
                 <div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title text-center"> <strong>Question Insertion Form </Strong></h3>
						
					</div>
					<div class="panel-body" style="margin:25px;">
					
					
        <div class="row text-center">
            <h2>Insert New Questions</h2>
        </div>
		<form action="insert.php" method="POST" >
        <div>
            <label for="firstname" class="col-md-2">
               Question
            </label>
            <div class="col-md-10">
                <textarea name="question"rows="3" type="text" class="form-control" id="firstname" placeholder="Enter Question" required></textarea>
            </div>
            
        </div>        
        <div>
            <label  class="col-md-2">
               Option 1
            </label>
            <div class="col-md-10">
                <input name="opt1" type="text" class="form-control" id="lastname" placeholder="Enter Option 1" required>
            
			</div>
		</div>
        <div>
            <label  class="col-md-2">
               Option 2
            </label>
            <div class="col-md-10">
                <input name="opt2" type="text" class="form-control" id="emailaddress" placeholder="Enter Option 2" required>
              
            </div>
             
        </div>
		
		 <div>
            <label class="col-md-2">
               Option 3
            </label>
            <div class="col-md-10">
                <input name="opt3" type="text" class="form-control" id="emailaddress" placeholder="Enter Option 3" required>
              
            </div>
             
        </div>
		
		 <div>
            <label class="col-md-2">
               Option 4
            </label>
            <div class="col-md-10">
                <input name="opt4" type="text" class="form-control" id="emailaddress" placeholder="Enter Option 4" required>
              
            </div>
             
        </div>
		
		 <div>
            <label class="col-md-2">
               Right Answer
            </label>
            <div class="col-md-10">
                <input name="ans" type="text" class="form-control"  placeholder="Enter Right Answer" required>
              
            </div>
             
        </div>
        
       
        <div>
            <label  class="col-md-2">
                Select Qustion Categary
            </label>
            <div class="col-md-10">
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
            </div>            
        </div>
       
       
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8 text-center">
                <input type="submit" class="btn btn-info btn-lg" name="sub"/>
                   
            </div>
			<div class="col-md-2"> </div>
        </div>
		</form>
    </div>  
				
				
					
					</div>
        
                        
         </div>
       </div>
				<div class="col-lg-1"></div>
   </div>
            
        </div>
    </div>
    <!-- /#wrapper -->

</body>
</html>
