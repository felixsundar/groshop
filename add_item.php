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
$cat_id=$_GET['cat_id'];
$sub_cat_id=$_GET['sub_cat_id'];
$query="select category_name from categories where category_id='$cat_id'";
$query1="select sub_cat_name from sub_categories where sub_cat_id='$sub_cat_id'";
$result=mysqli_query($conn,$query);
$result1=mysqli_query($conn,$query1);
if(!($result) | !($result1))
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
<center>
<h2>ADD NEW ITEM</h2>
<form action="add_item1.php?cat_id=<?php echo $cat_id?>&sub_cat_id=<?php echo $sub_cat_id?>" method="post">
<table>
<tr>
<td align="right">Product id  : </td><td align="left"><input type="text" name="product_id"></td></tr>
<td align="right">Product name: </td><td align="left"><input type="text" name="product_name"></td></tr>
<td align="right">Quantity    :	</td><td align="left"><input type="text" name="quantity"></td></tr>
<td align="right">Price       : </td><td align="left"><input type="text" name="price"></td></tr>
<td align="right">Image link  : </td><td align="left"><input type="text" name="image"></td></tr>
</table>
<br>
<button>Add Item</button>
</form>
</body>
</html>`