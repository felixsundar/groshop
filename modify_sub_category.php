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
$cat_id=$_GET['cat_id'];
$sub_cat_id=$_GET['sub_cat_id'];
$query="select category_name from categories where category_id='$cat_id'";
$query1="select * from sub_categories where sub_cat_id='$sub_cat_id'";
$query2="select category_id,category_name from categories";
$result=mysqli_query($conn,$query);
$result1=mysqli_query($conn,$query1);
$result2=mysqli_query($conn,$query2);
if(!($result) | !($result1) | !($result2))
{
	echo "Error";
}
$row = $result->fetch_assoc();
$row1 = $result1->fetch_assoc();
?>
<div style="text-align:left;background-color:#ddddff;color:#0000aa;font-size:150%">
	<a href="home.php">Admin Home</a> 
	>> <a href="categories.php">Categories</a> 
	>> <a href="sub_categories.php?cat_id=<?php echo $cat_id;?>"><?php echo $row["category_name"];?></a>
	>> <a href="">Modify Sub-Category</a>
</div>
<center><br>
<h2>Modify <?php echo $row1["sub_cat_name"];?></h2>
<form action="modify_sub_category1.php?cat_id=<?php echo $cat_id;?>&sub_cat_id=<?php echo $sub_cat_id;?>" method="post">
Category : 
<select name="cat_id">
<?php
while($row=$result2->fetch_assoc())
{
	if($row["category_id"]==$cat_id)
	{
		echo "<option value='".$cat_id."' selected>".$row['category_name']."</option>";
	}
	else
	{
		echo "<option value='".$cat_id."'>".$row['category_name']."</option>";
	}
}
?>	
</select>
<br><br>
Sub-Category name : <input type="text" name="sub_cat_name" value="<?php echo $row1["sub_cat_name"];?>"><br><br>
Sub-Category Id : <input type="text" name="sub_cat_id" value="<?php echo $row1["sub_cat_id"];?>"><br><br>
Image link : <input type="text" name="image" value="<?php echo $row1["image"];?>">
<img src='<?php echo $row1["image"];?>' alt="image here" height="100" width="100">
<br><br>
<button>Modify</button>
</form>
<a href="sub_categories.php?cat_id=<?php echo $cat_id;?>"><button>Cancel</button></a>
</body>
</html>