<!DOCTYPE html>
<html>
<head>
<style>
header
{
   text-align:center;
   display:block;
   color:blue;
   background-color:#ffffff;
   font-size:400%;
}
button
{
   border:1px solid #0000aa;
   border-radius:5px;
   display:block;
   color:blue;
   background-color:#aaaaff;
   font-size:100%;
   margin-bottom:15px;
}
a
{
   text-decoration:none;
}
h2                            
{
   color:blue;
   font-size:250%;
}
</style>
</head>
<body>
<header>GROSHOP</header><br><br>

<?php
include('conn.php');
$pid=$_GET['product_id'];
$cid=$_GET['catagory_id'];
$sid=$_GET['sub_cat_id'];
$sub_cat_id=$_POST['sub_cat_id'];
$product_id=$_POST['product_id'];
$product_name=$_POST['product_name'];
$price=$_POST['price'];
$available=$_POST['available'];
$quantity=$_POST['quantity'];
$image=$_POST['image'];

$query="update items set sub_cat_id='$sub_cat_id',product_id='$product_id',product_name='$product_name',price=$price,available=$available,quantity='$quantity',image='$image' where product_id='$pid'";
$query1="select sub_cat_name from sub_categories where sub_cat_id='$sid'";
$query2="select category_name from categories where category_id='$cid'";

$result=mysqli_query($conn,$query);
$result1=mysqli_query($conn,$query1);
$result2=mysqli_query($conn,$query2);

if(!($result) | !($result1) | !($result2) )
{
	echo "Error";
}

$row = $result->fetch_assoc();
$row1 = $result1->fetch_assoc();
$row3 = $result3->fetch_assoc();

?>
<div style="text-align:left;background-color:#ddddff;color:#0000aa;font-size:150%">
	<a href="home.php">Admin Home</a>
	>> <a href="categories.php">Categories</a>
	>> <a href="sub_categories.php?cat_id=<?php echo $cat_id;?>"><?php echo $row2["category_name"];?></a>
	>> <a href="items.php?cat_id=<?php echo $cid;?>&sub_cat_id=<?php echo $sid;?>"><?php echo $row1["sub_cat_name"];?></a>
	>> <a href="">Modify Product details</a>
</div>
<center><br>

Product details modified successfully!!!<br>

<a href="items.php?cat_id=<?php echo $cid;?>&sub_cat_id=<?php echo $sid;?>"><button>Goto <?php echo $row1['sub_cat_name'];?></button></a>
</body>
</html>