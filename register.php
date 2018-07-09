<?php
include "configure.php";
$f_name=$_POST["f_name"];
$l_name=$_POST["l_name"];
$email=$_POST["email"];
$city=$_POST["city"];
$password=$_POST['pass'];
$RePassword=$_POST['Re_Enter_Password'];
$country=$_POST["country"];
$address1=$_POST["address1"];
$address2=$_POST["address2"];
$mobile=$_POST["mobile"];
$name="/^[_A-Z][_a-zA-Z ]+$/";
$number="/^[0-9]+$/";
if(empty($f_name)&&empty($l_name)&&empty($emial)&&empty($city)&&empty($password)&&empty($RePassword)&&empty($country)&&empty($address1)&&empty($address2)&&empty($mobile))
{
	echo "<div class='row'><div class='col-md-2'></div><div class='col-md-5'><div class='alert alert-warning' style='width:500px;'>
		<div><strong><span><font color='red'>* </></span>All fields are mandatory.....! </strong></div></div><div class='col-md-6'></div></div>
		</div>";
}
else{
if(!preg_match($name,$f_name))
{
	echo "<div class='row'><div class='col-md-2'></div><div class='col-md-5'><div class='alert alert-warning' style='width:500px;'>
		<div><strong><span><font color='red'>* </></span>First_Name Should be starts with uppercase.....!</strong></div></div><div class='col-md-6'></div></div>
		</div>";
	
}
if(!preg_match($name,$l_name))
{
	echo "<div class='row'><div class='col-md-2'></div><div class='col-md-5'><div class='alert alert-warning' style='width:500px;'>
		<div><strong><span><font color='red'>* </></span>Last_Name Should be starts with uppercase .....! </strong></div></div><div class='col-md-6'></div></div>
		</div>";
	
}

if(!filter_var($email,FILTER_VALIDATE_EMAIL))
{
	echo "<div class='row'><div class='col-md-2'></div><div class='col-md-5'><div class='alert alert-warning' style='width:500px;'>
		<div><strong><span><font color='red'>* </></span>Invalid Emailid  .....!</strong></div></div><div class='col-md-6'></div></div>
		</div>";
	
}
if(strlen($password)<9)
{
	echo "<div class='row'><div class='col-md-2'></div><div class='col-md-5'><div class='alert alert-warning' style='width:500px;'>
		<div><strong><span><font color='red'>* </></span>Password is Week  .....!</strong></div></div><div class='col-md-6'></div></div>
		</div>";
}
if($password!=$RePassword)
{
	echo "<div class='row'><div class='col-md-2'></div><div class='col-md-5'><div class='alert alert-warning' style='width:500px;'>
		<div><strong><span><font color='red'>* </></span>Invalid Password .....!</strong></div></div><div class='col-md-6'></div></div>
		</div>";
}
if(strlen($mobile)<10)
{
	echo "<div class='row'><div class='col-md-2'></div><div class='col-md-5'><div class='alert alert-warning' style='width:500px;'>
		<div><strong><span><font color='red'>* </></span>Mobile_No should be more than 10 .....! </strong></div></div><div class='col-md-6'></div></div>
		</div>";
}



if($password==$RePassword&&preg_match($name,$f_name)&&preg_match($name,$l_name)
	&&filter_var($email,FILTER_VALIDATE_EMAIL)&&!empty($city)&&!empty($country)
	&&!empty($address1)&&!empty($address2)&&strlen($mobile)>=10)
{
	echo "<div class='alert alert-success'>
		<div><strong>Data inserted successfully</strong></div>
		</div>";
}
$sql="SELECT user_id FROM user_info WHERE email = '$email' LIMIT 1";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
	echo "<div class='row'><div class='col-md-2'></div><div class='col-md-5'><div class='alert alert-warning' style='width:500px;'>
		<div><strong><span><font color='red'>* </></span>Emailid already exist  </strong></div></div><div class='col-md-6'></div></div>
		</div>";
		exit();
}
else
{
	$password=md5($_POST['pass']);
	$sql="INSERT INTO gue_store.user_info(user_id,first_name,last_name, email, password,mobile,address1,address2) 
	VALUES (NULL,'$f_name','$l_name','$email','$password','$mobile','$address1','$address2') ";
	$result=mysqli_query($conn,$sql);
	if($conn->connect_error)
	{
		echo '$conn->connect_error';
	}
}
}

?>