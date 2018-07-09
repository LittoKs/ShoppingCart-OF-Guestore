<?php
session_start();
if(!isset($_SESSION['id']))
{
	header("location:index.php");
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
	cate();
	function cate()
	{
		$.ajax({
			url  : "action.php",
			method :"POST",
			data : {main_cart:1},
			success : function(data)
			{
				$("#My_Cart").html(data);
			}
		
	})
	}
	$("body").delegate(".qty","keyup",function()
	{
		
		var pid=$(this).attr("pid");
		var qty=$("#qty-"+pid).val();
		var price=$("#price-"+pid).val();
		var total=qty * price;
		$("#total-"+pid).val(total);
		
	})
	$("body").delegate("#btn-delete","click",function(event)
	{
		event.preventDefault();
		var pid=$(this).attr("pid");
		$.ajax({
			url : "action.php",
			method: "POST",
			data: {delete:1,pid:pid},
			success : function(data)
			{
				
				
				window.location.href="cart.php";
				
			}
			
		})
	})
	$("body").delegate("#btn-update","click",function(event)
	{
		event.preventDefault();
		var pid=$(this).attr("pid");
		var qty=$("#qty-"+pid).val();
		var price=$("#price-"+pid).val();
		var total=$("#total-"+pid).val();
		$.ajax({
			url : "action.php",
			method: "POST",
			data: {update:1,pid:pid,qty:qty,price:price,total:total},
			success : function(data)
			{
				
				
				$("#dlete_msg").html(data);
				
				
			}
			
		})
	})
	$("#buy").click(function()
	{
		$.ajax({
			 url : "action.php",
			 method:"POST",
			 data:{buy:1},
			 success:function(data)
			 {
				 window.location.href="customer_order.php";
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
		</ul>
	</div>
</div>
<div></br></div>
<div></br></div>
<div></br></div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div id="delete_msg"></div>
		</div>
		<div class="col-md-2"></div>
	</div>
	<div class="row">
		<div class="col-md-12" id="msg">
		</div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="panel panel-primary">
				<div class="panel-heading">MyCart</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-2">Action</div>
						<div class="col-md-2">Product Image</div>
						<div class="col-md-2">Product Name</div>
						<div class="col-md-2">Qty</div>
						<div class="col-md-2">Price</div>
						<div class="col-md-2">TotalPrice</div>
					</div>
					<div></br></div>
					<div></br></div>
					<div id="My_Cart"><div></br></div></div>
					<div></br></div>
					<div></br></div>
					<div class="row">
						<div class="col-md-10"></div>
						<div class="col-md-2" >
							<a href="#" class="btn btn-danger" id="buy">BUY NOW</a>
						</div>
					</div> 
				</div>
				<div class="panel-footer">&copy;2018</div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>
</body>
</html>
		