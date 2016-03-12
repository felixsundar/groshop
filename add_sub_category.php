<html>
<head>
<style>
header
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
	>> <a href="sub_categories.php?cat_id=$cat_id"><?php echo $row['category_name'];?></a> 
	>> <a href = "">Add Sub-Category</a>
</div>
<center>
<h2>ADD NEW SUB-CATEGORY</h2>
<form action="add_sub_category1.php?cat_id=<?php echo $cat_id?>" method="post">
<table>
<tr>
<td align="right">Sub_Category id :</td><td align="left"><input type="text" name="sub_cat_id"></td></tr>
<tr>
<td align="righ">Sub_Category name:</td><td align="left"><input type="text" name="sub_cat_name"></td></tr>
<tr>
<td align="right">Image link      : </td><td align="left"><input type="text" name="image"></td></tr>
</table>
<br>
<button>Add Sub-Category</button>
</form>
</body>
</html>`