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
<header>GROSHOP</header>
<?php
include('conn.php');
$cat_id=$_GET['cat_id'];
$query="select category_name from categories where category_id='$cat_id'";
$result=mysqli_query($conn,$query);
if(!($result))
{
	echo "Error";
}
$row = $result->fetch_assoc();
?>
<div style="text-align:left;background-color:#ddddff;color:#0000aa;font-size:150%">
	<a href="home.php">Admin Home<a/>
	>> <a href="categories.php">Categories</a> 
	>> <a href="sub_categories.php?cat_id=<?php echo $cat_id?>"><?php echo $row['category_name'];?></a> 
	>> <a href = "">Add Sub-Category</a>
</div>
<center><br><br>
<?php
include('conn.php');
$cid=$_GET["cat_id"];
$scid=$_POST["sub_cat_id"];
$scname=$_POST["sub_cat_name"];
$silink=$_POST["image"];

$query="insert into sub_categories values('".$scid."','".$scname."',0,'".$cid."','".$silink."')";

if(!(mysqli_query($conn, $query)))
{
	echo "Adding new subcategory failed!!!";
}
else
{
	echo "New subcategory added successfully!!!";
}
mysqli_close($conn);
?>

<a style="color:#0000aa;font-size:150%" href="sub_categories.php?cat_id=<?php echo $cid;?>">Goto <?php echo $row['category_name'];?></a>
</body>
</html>