
<?php 
session_start();
require("configure.php");
if(isset($_POST["login"]))
{
	$email=mysqli_real_escape_string($conn,$_POST['user_name']);
	$pass=md5($_POST['user_pass']);
	$sql="select * from user_info where email='$email'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)==1)
	{
		$row = $result->fetch_assoc();
		$_SESSION['email']=$row['email'];
		$_SESSION['f_name']=$row['first_name'];
		$_SESSION['l_name']=$row['last_name'];
		$_SESSION['id']=$row['user_id'];
		$_SESSION['pass']=$row['password'];
		
			
			
			
		
	}
	?>