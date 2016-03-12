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
a
{
   text-decoration:none;
}
</style>
</head>
<body>
<header>GROSHOP</header><br><br>
<?php
include('conn.php');
$cat_id=$_GET['cat_id'];
$sub_cat_id=$_GET['sub_cat_id'];
$query="select category_name from categories where category_id='$cat_id'";
$query1="select sub_cat_name from sub_categories where sub_cat_id='$sub_cat_id'";
$query2="update sub_categories set num_items=num_items+1 where sub_cat_id='$sub_cat_id'";
$query3="update categories set num_items=num_items+1 where category_id='$cat_id'";
$result=mysqli_query($conn,$query);
$result1=mysqli_query($conn,$query1);
$result2=mysqli_query($conn,$query2);
$result3=mysqli_query($conn,$query3);
if(!($result) | !($result1) | !($result2) | !($result3))
{
	echo "Error";
}
$row = $result->fetch_assoc();
$row1 = $result1->fetch_assoc();
?>
<div style="text-align:left;background-color:#ddddff;color:#0000aa;font-size:150%">
	<a href="home.php">Admin Home<a/>
	>> <a href="categories.php">Categories</a>
	>> <a href="sub_categories.php?cat_id=<?php echo $cat_id;?>"><?php echo $row['category_name'];?></a>
	>> <a href="items.php?sub_cat_id=<?php echo $sub_cat_id;?>&cat_id=<?php echo $cat_id;?>"><?php echo $row1['sub_cat_name'];?></a>
	>> <a href="">Add Item</a>
</div>
<center><br><br>
<?php
include('conn.php');
$cid=$_GET["cat_id"];
$scid=$_GET["sub_cat_id"];
$pid=$_POST["product_id"];
$pname=$_POST["product_name"];
$quantity=$_POST["quantity"];
$price=$_POST["price"];
$ilink=$_POST["image"];

$query="insert into items values('".$pid."','".$pname."','".$quantity."','".$price."','".$cid."','".$scid."',0,'".$silink."')";

if(!(mysqli_query($conn, $query)))
{
	echo "Adding new item failed!!!";
}
else
{
	echo "New item added successfully!!!";
}
mysqli_close($conn);
?>

<a style="color:#0000aa;font-size:150%" href="items.php?cat_id=<?php echo $cid;?>&sub_cat_id=<?php echo $sub_cat_id;?>">Goto <?php echo $row1['sub_cat_name'];?></a>
</body>
</html>