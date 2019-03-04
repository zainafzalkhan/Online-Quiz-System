<?php 
session_start();
include "../secureUser.php";
include "../include.php";
if(isset($_POST['sub']))
{
print_r($_POST);
$name=$_POST['name'];
$subject=$_POST['subject'];
$massege=$_POST['massege'];
$email=$_SESSION['email'];

$q="INSERT into feedback values('',now(),'$subject','$massege','$name','$email')";
$res=mysqli_query($cn,$q);
if($res)
{
echo "Succeess";

}

}

?>

<html>
<head>
<title>My-Account</title>
<link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.css">
<script src="../bootstrap/jquery-1.10.2.js"></script>
<script src="../bootstrap/bootstrap.js"></script>

</head>

<body style="background-color:#444;">
<!-- Add Header by include file-->
<?php require_once('user_header.html');?>

<div class="Row" style="padding-top:80px;">
<div class="col-sm-4 col-md-4"></div>

<?php 
$user=$_SESSION['user_name'];
$q="select * from member where m_name='$user' ";
$result=mysqli_query($cn,$q) or die(mysql_error());
$row=mysqli_fetch_array($result);

?>
<div class="col-sm-4 col-md-4 panel panel-default text-center" >
              <div class="panel-heading">
                <h3 class="panel-title">Feedback</h3>
              </div>
              <div class="panel-body" style="color:#fff;">
               <form class="contact-form" method="POST" action="feedback.php ">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Name"  required >
                                    </div>
                                    <div class="col-md-6">
                                        <label>Subject</label>
                                        <input type="text" name="subject" class="form-control" placeholder="Subject "  required>
                                    </div>
                                </div>
								<label><?php $_SESSION['user_email'];?></label>
                                <label>Message</label>
                                <textarea class="form-control" name="massege" rows="4" placeholder="Tell us your thoughts and feelings..."  required ></textarea>
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <input type="submit"class="btn btn-danger btn-block btn-lg " name="sub" value="Send"/>
                                    </div>
                                </div>
                            </form>
              </div>
</div>


<div class="col-sm-4 col-md-4">

</div>
</div>
</body>

</html>