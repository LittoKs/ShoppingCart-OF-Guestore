<?php
session_start();
include "configure.php";
if(isset($_POST["category"]))
{
$query="select * from categories";
$result=mysqli_query($conn,$query);
echo "<div class='nav nav-pills nav-stacked'>
					<li class='active'><a href='#' ><h4>Category</h4></a></li>";
if(mysqli_num_rows($result)>0)
{
	while($row = $result->fetch_assoc())
	{
		$cat_id=$row['category_id'];
		$cat_name=$row['category_title'];
		echo "<li><a href='#' class='category' cid='$cat_id'>$cat_name</a></li>";
	}
	
}
echo "</div>";
}
if(isset($_POST["brand"]))
{
$query="select * from brand";
$result=mysqli_query($conn,$query);
echo "<div class='nav nav-pills nav-stacked'>
					<li class='active'><a href='#' ><h4>Brand</h4></a></li>";
if(mysqli_num_rows($result)>0)
{
	while($row = $result->fetch_assoc())
	{
		$brand_id=$row['brand_id'];
		$brand_name=$row["brand_title"];
		echo "<li><a href='#' class='brand' bid='$brand_id'>$brand_name</a></li>";
	}
	
}
echo "</div>";
}
if(isset($_POST["product"]))
{
$query="select * from products order by rand() limit 0,9";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0)
{
	while($row = $result->fetch_assoc())
	{
			$pro_id=$row['product_id'];
			$pro_name=$row["product_title"];
			$pro_cat=$row['product_cat'];
			$pro_brand=$row['product_brand'];
			$pro_price=$row['product_price'];
			$pro_dec=$row['product_desc'];
			$pro_img=$row['product_image'];
			$pro_keyword=$row['product_keyword'];
			echo "
								<div class='col-md-4'>
									<div class='panel panel-info'>
										<div class='panel-heading'>$pro_name</div>
											<div class='panel-body'>
												<img src='images/$pro_img'>
											</div>
												<div class='panel-heading'>$pro_price.00
													<button pid='$pro_id' style='float:right;' id='idpro' class='btn btn-danger btn-xs'>AddCart</button>
												</div>
									</div>
								</div>";
	}
		
}
}
if(isset($_POST["category_select"])||isset($_POST["brand_select"])||isset($_POST["search"]))
{
	if(isset($_POST["category_select"]))
	{
	$cat_id=$_POST['cat_id'];
    $query="select * from products where product_cat=$cat_id";

	}
	else if(isset($_POST["brand_select"]))
	{
		$bra_id=$_POST['bra_id'];
        $query="select * from products where product_brand=$bra_id";

	}
	else{
		$keyword=$_POST['keyword'];
		$query="select * from products where product_keyword like '%$keyword%'";
		
	}
	$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0)
{
	while($row = $result->fetch_assoc())
	{
			$pro_id=$row['product_id'];
			$pro_name=$row["product_title"];
			$pro_cat=$row['product_cat'];
			$pro_brand=$row['product_brand'];
			$pro_price=$row['product_price'];
			$pro_dec=$row['product_desc'];
			$pro_img=$row['product_image'];
			$pro_keyword=$row['product_keyword'];
			echo "
								<div class='col-md-4'>
									<div class='panel panel-info'>
										<div class='panel-heading'>$pro_name</div>
											<div class='panel-body'>
												<img src='images/$pro_img'>
											</div>
												<div class='panel-heading'>$pro_price.00
													<button pid='$pro_id' style='float:right;' id='idpro' class='btn btn-danger btn-xs'>AddCart</button>
												</div>
									</div>
								</div>";
	}
		
}
}
if(isset($_POST['addcart']))
{
	$user_id=$_SESSION['id'];
	$pid=$_POST['prod_id'];
	$sql="select * from cart where p_id='$pid' and user_id='$user_id'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0)
	{
		echo "<div class='alert alert-warning' >
		<div><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Product already added to cart......!</strong></div>
		</div>";
	}
	else{
		$sql="select * from products where product_id='$pid'";
		$result=mysqli_query($conn,$sql);
		if($row = $result->fetch_assoc())
		{
		    $pro_id=$row['product_id'];
			$pro_name=$row["product_title"];
			$pro_cat=$row['product_cat'];
			$pro_brand=$row['product_brand'];
			$pro_price=$row['product_price'];
			$pro_dec=$row['product_desc'];
			$pro_img=$row['product_image'];
			$pro_keyword=$row['product_keyword'];
			
			$sqladd="INSERT INTO `cart`(id,p_id,ip_address,user_id,product_title,product_image,qty,price, total_amount) 
			VALUES (NULL,'$pid','NULL','$user_id','$pro_name','$pro_img','1','$pro_price','$pro_price')";
			$result=mysqli_query($conn,$sqladd);
			if($result)
			{
				echo "<div class='alert alert-success'>
		<div><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>$pro_name  is added to cart</strong></div>
		</div>";
			}
		}
		
	}
}
if(isset($_POST['get_cart']))
{
	$uid=$_SESSION['id'];
	$sql="select * from cart where user_id='$uid'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0)
	{
		$no=1;
		while($row = $result->fetch_assoc())
		{
		 $cid=$row['id'];
		 $img=$row['product_image'];
		 $name=$row['product_title'];
		 $price=$row['price'];
	echo "<div class='container-fluid'>
					<div class='row'>
						<div class='col-md-3 glyphicon glyphicon-share-alt' >  $no</div>
						<div class='col-md-3'><img src='images/$img' width='60px';></div>
						<div class='col-md-3'>$name</div>
						<div class='col-md-3'>$price.00</div>
					</div>
					</div>";
					$no++;
		}
	}
}
if(isset($_POST['main_cart']))
{
	$uid=$_SESSION['id'];
	$sql="select * from cart where user_id='$uid'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0)
	{
		$tt=1;
		while($row = $result->fetch_assoc())
		{
		 $cid=$row['id'];
		 $pro_id=$row['p_id'];
		 $img=$row['product_image'];
		 $name=$row['product_title'];
		 $price=$row['price'];
		 $qty1=$row['qty'];
		 $total=$row['total_amount'];
		 $ar_tt=array($total);
		 $tt=array_sum($ar_tt)+$tt;
	echo "<div class='row'>
						<div class='col-md-2'>
							<div class='btn-group'>
								<a href='#' class='btn btn-danger glyphicon glyphicon-trash' pid='$pro_id' id='btn-delete'></a>
								<a href='#' class='btn btn-primary glyphicon glyphicon-floppy-save' pid='$pro_id' id='btn-update'></a>
							</div>
						</div>
						<div class='col-md-2'><img src=images/$img width='60px';></div>
						<div class='col-md-2'>$name</div>
						<div class='col-md-2'>
							<input type='text' class='form control qty' value='$qty1' pid='$pro_id' id='qty-$pro_id' style='width:120px;'>
						</div>
						<div class='col-md-2'>
						<div ><input type='text' class='form control price' value='$price' pid='$pro_id' id='price-$pro_id' style='width:120px;' disabled></div>
						</div>
						<div class='col-md-2'>
						<div ><input type='text' class='form control total' value='$total' pid='$pro_id' id='total-$pro_id' style='width:120px;' disabled></div>
						</div>
					</div>";
		}
		echo "<div class='row'>
				<div class='col-md-8'></div>
				<div class='col-md-2' style='color:blue;'>Total Amount<span style='color:blue;'> [</span><span style='color:red;'>+Gst</span><span style='color:blue;'>]</span></div>
				<div class='col-md-2'>$tt.00</div>
		</div>";
		
		
	}
}
if(isset($_POST['delete']))
{
	$user_id=$_SESSION['id'];
	$pid=$_POST['pid'];
	$sql="delete from cart where user_id='$user_id' and p_id='$pid'";
	$result=mysqli_query($conn,$sql);
	if($result->fetch_assoc()==true)
	{
		echo "<div class='alert alert-success'>
		<div><strong>Product is removed from cart....!</strong></div>
		</div>";
	}
}
if(isset($_POST['update']))
{
	$user_id=$_SESSION['id'];
	$pid=$_POST['pid'];
	$qty=$_POST['qty'];
	$price=$_POST['price'];
	$total=$_POST['total'];
	$sql="Update  cart SET qty='$qty',price='$price',total_amount='$total' where user_id='$user_id' and p_id='$pid'";
	if(mysqli_query($conn,$sql))
	{
		$u_id=$_SESSION['id'];
	$sql1="select * from cart where user_id='$u_id'";
	$result=mysqli_query($conn,$sql1);
	if(mysqli_num_rows($result)>0)
	{
		$tt=1;
		while($row = $result->fetch_assoc())
		{
		 $cid=$row['id'];
		 $pro_id=$row['p_id'];
		 $img=$row['product_image'];
		 $name=$row['product_title'];
		 $qty1=$row['qty'];
		 $price1=$row['price'];
		 $total1=$row['total_amount'];
		 $ar_tt=array($total);
		 $tt=array_sum($ar_tt)+$tt;
		 
	echo "<div class='row'>
						<div class='col-md-2'>
							<div class='btn-group'>
								<a href='#' class='btn btn-danger glyphicon glyphicon-trash' pid='$pro_id' id='btn-delete'></a>
								<a href='#' class='btn btn-primary glyphicon glyphicon-floppy-save' pid='$pro_id' id='btn-update'></a>
							</div>
						</div>
						<div class='col-md-2'><img src=images/$img width='60px';></div>
						<div class='col-md-2'>$name</div>
						<div class='col-md-2'>
							<input type='text' class='form control qty' value='$qty1' pid='$pro_id' id='qty-$pro_id' style='width:120px;'>
						</div>
						<div class='col-md-2'>
						<div ><input type='text' class='form control price' value='$price1' pid='$pro_id' id='price-$pro_id' style='width:120px;' disabled></div>
						</div>
						<div class='col-md-2'>
						<div ><input type='text' class='form control total' value='$total1' pid='$pro_id' id='total-$pro_id' style='width:120px;' disabled></div>
						</div>
					</div>";
		}
		echo "<div class='row'>
				<div class='col-md-8'></div>
				<div class='col-md-2' style='color:blue;'>Total Amount<span style='color:blue;'> [</span><span style='color:red;'>+Gst</span><span style='color:blue;'>]</span></div>
				<div class='col-md-2'>$tt.00</div>
		</div>";
	}
	}
}
if(isset($_POST["products"]))
{
$query="select * from products order by rand() ";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0)
{
	while($row = $result->fetch_assoc())
	{
			$pro_id=$row['product_id'];
			$pro_name=$row["product_title"];
			$pro_cat=$row['product_cat'];
			$pro_brand=$row['product_brand'];
			$pro_price=$row['product_price'];
			$pro_dec=$row['product_desc'];
			$pro_img=$row['product_image'];
			$pro_keyword=$row['product_keyword'];
			echo "
								<div class='col-md-4'>
									<div class='panel panel-info'>
										<div class='panel-heading'>$pro_name</div>
											<div class='panel-body'>
												<img src='images/$pro_img'>
											</div>
												<div class='panel-heading'>$pro_price.00
													<button pid='$pro_id' style='float:right;' id='idpro' class='btn btn-danger btn-xs'>AddCart</button>
												</div>
									</div>
								</div>";
	}
		
}
}
if(isset($_POST['buy']))
{
	$uid=$_SESSION['id'];
	$sql="select * from  cart where user_id='$uid'";
	$result=mysqli_query($conn,$sql);
	while($row=$result->fetch_assoc())
	{
		$pro_id=$row['p_id'];
		$name=$row['product_title'];
		 $qty1=$row['qty'];
		 $price1=$row['total_amount'];
		 $img=$row['product_image'];
		 $sq="select * from customer_order where pid='$pro_id'";
		 $r=mysqli_query($conn,$sq);
		 if(mysqli_num_rows($r)==0)
		 {
		 $sql1="INSERT INTO customer_order(id,cid,pid,p_name,p_image,price,qty,p_status,tn_id)
		 VALUES (NULL,'$uid','$pro_id','$name','$img','$price1','$qty1','0','xxxxxxxxxx_x121') ";
			$res= mysqli_query($conn,$sql1);
		if($res)
			{
				echo "<div class='alert alert-success'>
		<div><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Success</strong></div>
		</div>";
			}
	}
	}
}
if(isset($_POST['order']))
{
	$uid=$_SESSION['id'];
	$sql="select * from  customer_order where cid='$uid'";
	$res=mysqli_query($conn,$sql);
	while($row=$res->fetch_assoc())
	{
		$name=$row['p_name'];
		 $qty1=$row['qty'];
		 $price1=$row['price'];
		 $img=$row['p_image'];
		 $tr=$row['tn_id'];
		 echo "<div class='row'>
							<div class='col-md-6'>
							 
						    <div style='margin-left:20px;'> <img src='images/$img'></div>
							</div>
							<div class='col-md-6'>
								<table>
									<tr><th> Product Name    </th><td>$name</td></tr>
									<tr><th>             Qty </th><td> $qty1</td></tr>
									<tr><th>           price </th><td>$price1.00</td></tr>
									<tr><th>           color </th><td> black</td></tr>
									<tr><th>Transaction Code </th><td> xxxx_xx10xxx1</td></tr>
								</table>
							</div>
							</div>
							<div></br></div>
						<div></br></div>";
	}
}
if(isset($_POST['notify']))
{
	$uid=$_SESSION['id'];
	$sql="delete  from cart where user_id='$uid'";
	$res=mysqli_query($conn,$sql);
	$sql1="delete  from customer_order where cid='$uid'";
	$res1=mysqli_query($conn,$sql1);
	
	if(mysqli_num_rows($res)==1&&mysqli_num_rows($res1)==1)
	{
		echo "true";
	}
	
}

?>