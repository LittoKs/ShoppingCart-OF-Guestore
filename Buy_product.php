<?php
session_start();
if(!isset($_SESSION['id']))
{
	header("location:index.php");
}
?>
<html>
<head>
<title>GueStores</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="main.js"></script>
</head>
<style>
td,th{
	padding:10px;
}
</style>
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
	$("body").delegate("#idpro","click",function(event)
	{
		var pro=$(this).attr("pid");
		event.preventDefault();
		$.ajax({
			url  : "action.php",
			method :"POST",
			data : {addcart:1,prod_id:pro},
			success : function(data)
			{
				$(".cartmsg").html(data);
			}
		})
	})
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
				else
				{
					alert(data);
				}
			}
		})
	})
	$("body").delegate("#cart_id","click",function()
	{
		$.ajax({
			url:"action.php",
			method:"POST",
			data:{get_cart:1},
			success:function(data)
			{
				
           $("#add_cart").html(data);
		   
		}
		})
	})
	$("#MyCart").click(function()
	{
		$.ajax({
			
			url : "cart.php",
			method : "POST",
			data :{Mycart:1},
			success:function(data)
			{
				window.location.href="cart.php";
			}
		})
	})
	$("#change_pass").click(function()
	{
		window.location.href="password_form.php";
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
		<ul class="nav navbar-nav navbar-right">
			<li><a href="#" class="glyphicon glyphicon-shopping-cart dropdown-toggle" data-toggle="dropdown" id="cart_id">Cart<span class="badge">
			<?php 
			include "configure.php";
			$uid=$_SESSION['id'];
	$sql="select * from cart where user_id='$uid'";
	$result=mysqli_query($conn,$sql);
	$no=0;
	if(mysqli_num_rows($result)>0)
	{
		
		while($row = $result->fetch_assoc())
		{
			$no++;
		}
	}
	echo $no;
			?></span></a>
				<ul class="dropdown-menu" style="width:400px;">
					<div class="panel panel-success">
					<div class="panel-heading">
					<div class="container-fluid">
					<div class="row">
						<div class="col-md-3 col-xs-3">Sl.No</div>
						<div class="col-md-3 col-xs-3">Product</div>
						<div class="col-md-3 col-xs-3">Name</div>
						<div class="col-md-3 col-xs-3">Price</div>
					</div>
					</div>
					</div>
					<div class="panel-body"></div>
					<div id="add_cart"></div>
					<div class="panel-footer"></div>
					</div>
				</ul>
			</li>
			<li class="" ><a href="#" class="glyphicon glyphicon-user dropdown-toggle" data-toggle="dropdown"><span><?php echo $_SESSION["f_name"].".".$_SESSION["l_name"];?></span></a>
			  <ul class="dropdown-menu">
				
					<li><a href="#" style="color:blue;" id="MyCart"> <span class="glyphicon glyphicon-shopping-cart">MyCart</span></a></li>
					<li class="divider"></li>
					<li><a href="#" style="color:blue;" id="change_pass"> <span class="glyphicon glyphicon-lock">ChangePassword</span></a></li>
					<li class="divider"></li>
					<li><a href="logout.php" style="color:blue;text-decoration:none;"> <span class="glyphicon glyphicon-user">SignOut</span></a></li>
				</div>
	</div>
</div>
	<div><br/></div>
	<div><br/></div>
	<div><br/></div>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel heading"><span class="h3">Conformation</span></div>
					<div class="panel body">
						<div class="row">
						
					<div class="col-md-8"><p>Thank you Litto...!</p><p> your orderd product of ------------- [transaction code : xxxxxxxxxx xxxx] will be deliverd to the below address on 19/feb/2019</p></div>
					<div class="col-md-4"><div style="float:left;"><a href="index.php" class="btn btn-success" >Continue Purchase</a></div></div>
					</div>
						<div class="panel footer"></div>
					</div>
				</div>
			</div>
			<div class="col-md-2"></div>
</body>
</html>