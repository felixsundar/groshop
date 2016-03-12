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
<div style="text-align:left;background-color:#ddddff;color:#0000aa;font-size:150%">
	<a href="home.php">Admin Home<a/> 
	>> <a href="categories.php">Categories</a> 
	>> <a href="">Modify category</a>
</div>
<?php
include('conn.php');
$cat_id=$_GET['cat_id'];
$query="select * from categories where category_id='$cat_id'";
$result=mysqli_query($conn,$query);
if(!($result))
{
	echo "Error";
}
$row = $result->fetch_assoc();
?>
<center>
<h2>Modify <?php echo $row["category_name"];?></h2>
<form action="modify_category1.php?cat_id=<?php echo $cat_id;?>" method="post">
<table>
<tr>
<td align="right">Category Id   :</td><td align="left"><input type="text" name="category_id" value="<?php echo $row["category_id"];?>"></td></tr>
<tr>
<td align="right">Category name :</td><td align="left"><input type="text" name="category_name" value="<?php echo $row["category_name"];?>"></td></tr>
<tr>
<td align="right">Image link    :</td><td align="left"><input type="text" name="image" value="<?php echo $row["image"];?>"></td></tr>
</table>
<img src='<?php echo $row["image"];?>' alt="image here" height="100" width="100">
<br>
<button>Modify</button>
</form>
<a href="categories.php"><button>Cancel</button></a>
</body>
</html>