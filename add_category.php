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
<div style="text-align:left;background-color:#ddddff;color:#0000aa;font-size:150%">
	<a href="home.php">Admin Home<a/>
	>> <a href="categories.php">Categories</a> 
	>> <a href="">Add category</a>
</div>
<center><br><br>
<?php
include('conn.php');

$cid=$_POST["category_id"];
$cname=$_POST["category_name"];
$ilink=$_POST["image"];

$query="insert into categories values('".$cid."','".$cname."',0,'".$ilink."')";

if(!(mysqli_query($conn, $query)))
{
	echo "Adding new category failed!!!";
}
else
{
	echo "New category added successfully!!!";
}
mysqli_close($conn);
?>
<a style="color:#0000aa;font-size:150%" href="categories.php">Goto categories</a>
</body>
</html>