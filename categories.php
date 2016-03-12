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
<div style="text-align:left;background-color:#ddddff;color:#0000aa;font-size:150%">
	<a href="www.codesapient.com/groshop/admin/home.php">Admin Home<a/>
	>> <a href="www.codesapient.com/groshop/admin/categories.php">Categories</a>
</div>
<center>
<h2>CATEGORIES</h2>

<?php
include('conn.php');
$query="select * from categories";
$result=mysqli_query($conn,$query);
if(!($result))
{
	echo "Error";
}
if ($result->num_rows > 0)
	{
	?>
		<table class="table table-stripped" align="center">
		<tr align="center">
		<th >Image</th>
		<th >Category Id</th>
		<th >Category Name</th>
		<th >Number of items</th>
		<th >Action</th>
		</tr>
		<?php
		while($row = $result->fetch_assoc()) 
		{
		?>
		<tr align="center">
			<td><img src='<?php echo $row['image'];?>'  alt="image here" height="100" width="100"></td>
			<td style="padding-top:40px"><?php echo $row['category_id'];?></td>
			<td style="padding-top:40px"> <?php echo $row['category_name'];?></td>
			<td style="padding-top:40px"><?php echo $row['num_items'];?></td>
			<td style="padding-top:40px"> <span><a href="sub_categories.php?cat_id=<?php echo $row['category_id'];?>">View</a> &nbsp&nbsp&nbsp <a href="modify_category.php?cat_id=<?php echo $row['category_id'];?>">Modify</a></span></td>
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
	<a href="add_category.html"><button>Add category</button></a>
	</body>
	</html>