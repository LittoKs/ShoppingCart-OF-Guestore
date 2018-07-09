
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
			url:"register.php",
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
			<div class="panel-heading">Login_Details</div>
			<div class="panel-body">
			<form method="POST">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-5">
								<label for"f_name">First_name</label>
								<input type="text" class="form-control" name="f_name" id="f_name" required="true">
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
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-5">
								<label for"Email">Email</label>
								<input type="text" class="form-control" name="email" id="email" "">
							</div>
							<div class="col-md-5">
								<label for"pass">Password</label>
								<input type="password" class="form-control" name="pass" id="pass" "">
							</div>
							<div class="col-md-2"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-5">
							<label for"Email">Re_Enter_Password</label>
								<input type="password" class="form-control" name="Re_Enter_Password" id="Re_Enter_Password" "">
								
							</div>
							<div class="col-md-5">
								<label for"pass">City</label>
								<input type="text" class="form-control" name="city" id="city" "">
							</div>
							<div class="col-md-2"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-5">
								<label for"Email">Country</label>
								<input type="text" class="form-control" name="country" id="country" "">
							</div>
							<div class="col-md-5">
								<label for"pass">Address1</label>
								<input type="textarea" class="form-control" name="address1" id="address1" placeholder="Temperary_Address" "">
							</div>
							<div class="col-md-2"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-5">
								<label for"Email">Address2</label>
								<input type="textarea" class="form-control" name="address2" id="address2" placeholder="Permenent_Address" "">
							</div>
							<div class="col-md-5">
								<label for"pass">Pincode</label>
								<input type="number" class="form-control" name="pin" id="pin" "">
							</div>
							<div class="col-md-2"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-5">
								<label for"Email">Mobile</label>
								<input type="number" class="form-control" name="mobile" id="mobile" "">
							</div>
							<div class="col-md-5">
							</div>
							<div class="col-md-2"></div>
						</div>
					</div>
				</div>
				<div></br></div>
				<div></br></div>
				<div></br></div>
				<div class="row">
				<div class="col-md-2"></div>
					<div class="col-md-8">
						<input style="float:right;" type="submit" name="SignUp" class="btn btn-success btn-lg" id="SignUp_btn" value="SignUp">
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
