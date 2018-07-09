<?php
session_start();
include "configure.php";
$user_email=$_POST['email'];
$old=md5($_POST['old_Password']);
$new=$_POST['new_pass'];
$re=$_POST['re_pass'];
$sql="select * from user_info where email='$user_email'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)==1)
	{
		$row = $result->fetch_assoc();
		$_SESSION['email']=$row['email'];
		$_SESSION['f_name']=$row['first_name'];
		$_SESSION['l_name']=$row['last_name'];
		$_SESSION['id']=$row['user_id'];
		$_SESSION['pass']=$row['password'];
		$session_mail=$_SESSION['email'];
		$session_pass=$_SESSION['pass'];
	


if(empty($old)&&empty($new)&&empty($re)&&!empty($email))
{
	echo "<div class='alert alert-warning'>
					<div><strong>Type Password</strong></div>
					</div>";
}
else
{
if($user_email==$session_mail)
{
	if($session_pass==$old)
	{
		if($new==$re)
		{
			if(strlen($new)>9&&strlen($re)>8)
			{
				$id=$_SESSION['id'];
				$new=md5($_POST['new_pass']);
				$re=md5($_POST['re_pass']);
				$sql="update user_info set password='$new' where user_id='$id'";
				if(mysqli_query($conn,$sql))
				{
					echo "<div class='alert alert-success'>
					<div><strong>Password Changed successfuly</strong></div>
					</div>";
				}
			}
			else
			{
				echo "<div class='alert alert-warning'>
				<div><strong>Week Password...!Containts more than 9 character</strong></div>
				</div>";;
			}
		}
		else
		{
			echo "<div class='alert alert-warning'>
		<div><strong>Type same password...!</strong></div>
		</div>";;
		}
	}
	else
	{
		echo "<div class='alert alert-warning'>
		<div><strong>Type Old Password Correctly....! </strong></div>
		</div>";
	}
}
	}
	}

?>