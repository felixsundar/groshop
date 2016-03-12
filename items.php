<head><!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>";
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
   border-radius:10px;
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
	>> <a href=""><?php echo $row1['sub_cat_name'];?></a>
 </div>
<center>
<h2><?php echo $row1['sub_cat_name'];?></h2>
<?php
$query="select * from items where sub_cat_id='$sub_cat_id'";
$result=mysqli_query($conn,$query);
if(!($result))
{
	echo "Error";
}
if ($result->num_rows > 0)
	{
	?>
		<table class="table table-stripped">
		<tr align="center">
		<th>Image</th>
		<th>Product Id</th>
		<th>Product Name</th>
		<th>Quantity</th>
		<th>Price (Rs.)</th>
		<th>Available</th>
		<th>Action</th>
		</tr>
		<?php
		while($row = $result->fetch_assoc()) 
		{
		?>
		<tr align="center">
			<td><img src='<?php echo $row['image'];?>'  alt="image here" height="100" width="100"></td>
			<td style="padding-top:40px"><?php echo $row['product_id'];?></td>
			<td style="padding-top:40px"> <?php echo $row['product_name'];?></td>
			<td style="padding-top:40px"><?php echo $row['quantity'];?></td>
			<td style="padding-top:40px"><?php echo $row['price'];?></td>
			<td style="padding-top:40px"><?php echo $row['available'];?></td>
			<td style="padding-top:40px"><a href="modify_item.php?product_id=<?php echo $row['product_id'];?>"><button>Modify</button></a></td>
		</tr>
		<?php
		}
		?>
		</table>
	<?php
	} 
	else 
	{
		echo "0 results";
	}
	?>
	<center>
	<a href="add_item.php?cat_id=<?php echo $cat_id;?>&sub_cat_id=<?php echo $sub_cat_id;?>"><button>Add Item</button></a>
	</body>
	</html>