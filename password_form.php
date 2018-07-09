

<html>
<head>
<title>Login</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<script>
$(document).ready(function()
{
$("#SignUp_btn").click(function(event)
{
	
	event.preventDefault();
	$.ajax(
		{
			url:"pass.php",
			method:"POST",
			data:$("form").serialize(),
			success:function(data)
			{
				$(".form_msg").html(data);
			}
			
		})
})
})
</script>

<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<a href="#" class="navbar-brand">GueStore</a>
		</div>
		<ul class="nav navbar-nav">
			<li><a href="index.php" class="glyphicon glyphicon-home">Home</a></li>
			<li><a href="#" class="glyphicon glyphicon-gift" >Product</a></li>
			</ul>
	</div>
</div>
<div></br></div>
<div></br></div>
<div></br></div>
<div class="container-fluid">
    <div class="row">
		<div class="col-md-12">
			<div class="form_msg">
			</div>
		</div>
	</div>
	<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="panel panel-primary">
			<div class="panel-heading">Change Password</div>
			<div class="panel-body">
			<form method="POST">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-5">
								<label for"f_name">First_name</label>
								<input type="text" class="form-control" name="f_name" id="f_name" "">
							</div>
							<div class="col-md-5">
								<label for"l_name">Last_name</label>
								<input type="text" class="form-control" name="l_name" id="l_name" "">
							</div>
							<div class="col-md-2"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						
								<label for"Email">Email</label>
								<input type="text" class="form-control" name="email" id="email" value="<?php session_start(); include "configure.php"; $email=$_SESSION['email'];
echo $email;
?>">
							</div>
					<div class="col-md-2"></div>
				</div>
				<div class="row">
					<div class="col-md-10">
							<label for"old_Password">Old Password</label>
								<input type="password" class="form-control" name="old_Password" id="old_Password" "">
					</div>
							<div class="col-md-2"></div>
						</div>
				<div class="row">
					<div class="col-md-10">
							<label for"new_pass">New Password</label>
								<input type="password" class="form-control" name="new_pass" id="new_pass" "">
					</div>
							<div class="col-md-2"></div>
					</div>
					<div class="row">
					<div class="col-md-10">
							<label for"re_pass">Reenetr_Password</label>
								<input type="password" class="form-control" name="re_pass" id="re_pass" "">
					</div>
							<div class="col-md-2"></div>
					</div>
				<div></br></div>
				<div></br></div>
				<div></br></div>
				<div class="row">
				<div class="col-md-2"></div>
					<div class="col-md-8">
						<input style="float:right;" type="submit" name="SignUp" class="btn btn-success btn-lg" id="SignUp_btn" value="Submit">
					</div>
				<div class="col-md-2"></div>
				</div>
				</form>
			</div>
			
		<div class="panel-footer"></div>
		</div>
	</div>
	<div class="col-md-2"></div>
	</div>
</div>

</html>
</body>
