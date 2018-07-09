<?php
session_start();
if(isset($_SESSION['id']))
{
	header("location:profile.php");
}
?>
<html>
<head>
<title>Store</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="main.js"></script>
</head>
<body>
<script> 
$(document).ready(function()
{
	cat();
	brand();
	product();
	function cat()
	{
		$.ajax
		({
		url :"action.php",
		method:"POST",
		data: {category:1},
		success: function(data)
		{
			$("#get_category").html(data);
		}
		})
		
	}
	function brand()
	{
		$.ajax
		({
			url:"action.php",
			method:"POST",
			data:{brand:1},
			success : function(data)
			{
				$("#get_brand").html(data);
			}
			
			
		})
	}
	function product()
	{
		$.ajax
		({
			url:"action.php",
			method:"POST",
			data:{product:1},
			success:function(data)
			{
				$("#get_product").html(data);
			}
			
		})
	}
	$('body').delegate(".category","click",function(event)
	{
		event.preventDefault();
		var cid=$(this).attr("cid");
		$.ajax(
		{
			url:"action.php",
			method:"POST",
			data:{category_select:1,cat_id:cid},
			success:function(data)
			{
				$("#get_product").html(data);
			}
			
		})
	})
	$("body").delegate(".brand","click",function(event)
	{
		event.preventDefault();
		var bid=$(this).attr('bid');
		$.ajax({
			url:"action.php",
			method:"POST",
			data:{brand_select:1,bra_id:bid},
			success:function(data)
			{
				$("#get_product").html(data);
			}
			
		})
	})
	$("#search_btn").click(function()
	{
		var keyword=$('#search').val();
		if(keyword!="")
		{
		$.ajax({
			url:"action.php",
			method:"POST",
			data:{search:1,keyword:keyword},
			success:function(data)
			{
				$("#get_product").html(data);
			}
		})
		}
	})
	$("#login").click(function(event)
	{
		event.preventDefault();
		var name=$('#email').val();
		var pass=$('#password').val();
		$.ajax({
			url:"login.php",
			method:"POST",
			data:{login:1,user_name:name,user_pass:pass},
			success:function(data)
			{
				if(data==name)
				{
				window.location.href="profile.php";
				}
				
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
			<li><a href="profile.php" class="glyphicon glyphicon-home">Home</a></li>
			<li><a href="products.php" class="glyphicon glyphicon-gift" >Product</a></li>
			<li style="width:200px;left:10px;top:10px;"><input type="text" class="form-control" id="search"></li>
			<li style="top:10px;left:10px;"><button  class="btn btn-primary" id="search_btn">search</button></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="#" class="glyphicon glyphicon-shopping-cart dropdown-toggle" data-toggle="dropdown">Cart<span class="badge">0</span></a>
				<ul class="dropdown-menu" style="width:400px;">
					<div class="panel panel-success">
					<div class="panel-heading">
					<div class="container-fluid">
					<div class="row">
						<div class="col-md-3">SL.No</div>
						<div class="col-md-3">Product</div>
						<div class="col-md-3">Name</div>
						<div class="col-md-3">Price</div>
					</div>
					</div>
					</div>
					<div class="panel-body"></div>
					<div class="panel-footer"></div>
					</div>
				</ul>
			</li>
			<li class="" ><a href="#" class="glyphicon glyphicon-user dropdown-toggle" data-toggle="dropdown">SignIn</a>
			  <ul class="dropdown-menu">
				<div class="panel panel-primary">
				<div id="sign_msg"></div>
					<div style="width:300px"></div>
					<div class="panel-heading">Login</div>
						<div class="panel-heading">
						<label class="h6">Email</label>
						<input type="text" class="form-control" id="email">
						<label class="h6">Password</label>
						<input type="password" class="form-control" id="password">
						<div><br/></div>
						<a href="#" style="color:white;list-style:none;">ForgotPassword</a><input type="submit" class="btn btn-success" style="float:right;" id="login" value="login">
						</div>
					<div class="panel-footer"></div>
				</div>
			  </ul>
			</li>
			<li><a href="login_form.php" class="glyphicon glyphicon-user">SignUp</a></li>
		</ul>
	</div>
</div>
	<div><br/></div>
	<div><br/></div>
	<div><br/></div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1">
			</div>
			<div class="col-md-2">
			<div id="get_category">
			</div>
			<!--replace product and brand using jquery and ajax -->
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="" ><h4>Category</h4></a></li>
					<li><a href="">Mobile and Accessories</a></li>
					<li><a href="">Watche</a></li>
					<li><a href="">footware</a></li>
					<li><a href="">ecelctronics</a></li>
				</div>-->
				<div id="get_brand">
				</div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="" ><h4>Brand</h4></a></li>
					<li><a href="">Nike</a></li>
					<li><a href="">addidas</a></li>
					<li><a href="">Woodland</a></li>
					<li><a href="">Tommy Hilfiger</a></li>
			   </div>-->
			</div>
			<div class="col-md-8">
				<div class="panel panel-info">
					<div class="panel-heading">Products</div>
					<div class="panel-body">
					<div id="get_product">
					</div>
							
								<!--<div class="col-md-4">
									<div class="panel panel-info">
										<div class="panel-heading">Fila Slipper</div>
											<div class="panel-body">
												<img src="images/fila1.jpg">
											</div>
												<div class="panel-heading">4,500.00
													<button style="float:right;" class="btn btn-danger btn-xs">AddCart</button>
												</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="panel panel-info">
										<div class="panel-heading">TShirt</div>
											<div class="panel-body">
												<img src="images/messi4.jpg">
											</div>
												<div class="panel-heading">800.00
													<button style="float:right;" class="btn btn-danger btn-xs">AddCart</button>
												</div>
									</div>
								</div>
								
								<div class="col-md-4">
									<div class="panel panel-info">
										<div class="panel-heading">Beats Headset</div>
											<div class="panel-body">
												<img src="images/beats.jpg">
											</div>
												<div class="panel-heading">9500.00
													<button style="float:right;" class="btn btn-danger btn-xs">AddCart</button>
												</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="panel panel-info">
										<div class="panel-heading">Rado</div>
											<div class="panel-body">
												<img src="images/watch1.jpg">
											</div>
												<div class="panel-heading">55,500.00
													<button style="float:right;" class="btn btn-danger btn-xs">AddCart</button>
												</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="panel panel-info">
										<div class="panel-heading">Iphone 6s</div>
											<div class="panel-body">
												<img src="images/iphone.jpg">
											</div>
												<div class="panel-heading">29,900.00
													<button style="float:right;" class="btn btn-danger btn-xs">AddCart</button>
												</div>
									</div>
								</div>
								
								<div class="col-md-4">
									<div class="panel panel-info">
										<div class="panel-heading">JBL Flip</div>
											<div class="panel-body">
												<img src="images/flip.jpg">
											</div>
												<div class="panel-heading">9999.00
													<button style="float:right;" class="btn btn-danger btn-xs">AddCart</button>
												</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="panel panel-info">
										<div class="panel-heading">Samsung S8</div>
											<div class="panel-body">
												<img src="images/galaxy.jpg">
											</div>
												<div class="panel-heading">59,500.00
													<button style="float:right;" class="btn btn-danger btn-xs">AddCart</button>
												</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="panel panel-info">
										<div class="panel-heading">Hp Laptop-core i5</div>
											<div class="panel-body">
												<img src="images/lap.jpg">
											</div>
												<div class="panel-heading">39,500.00
													<button style="float:right;" class="btn btn-danger btn-xs">AddCart</button>
												</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="panel panel-info">
										<div class="panel-heading">Iphone-Back Cover</div>
											<div class="panel-body">
												<img src="images/cover.jpg">
											</div>
												<div class="panel-heading">350.00
													<button style="float:right;" class="btn btn-danger btn-xs">AddCart</button>
												</div>
									</div>-->
								</div>
							</div>
						<div class="panel-footer">
						<div>&copy;2018</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-1">
			</div>
		</div>
	</div>
</body>
</html>