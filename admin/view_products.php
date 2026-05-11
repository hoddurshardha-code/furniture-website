<?php
include "../db.php";
?>

<!DOCTYPE html>
<html>
<head>

<title>Products</title>

<style>

body{
font-family:Arial;
background:#f3f3f3;
padding:30px;
}

h1{
color:#6c8e85;
}

.menu a{
background:#388b6f;
color:white;
padding:10px 20px;
text-decoration:none;
margin-right:5px;
}

table{
width:100%;
border-collapse:collapse;
margin-top:20px;
background:white;
}

th{
background:#388b6f;
color:white;
padding:12px;
}

td{
padding:10px;
border-bottom:1px solid #ddd;
text-align:center;
}

.edit{
color:blue;
text-decoration:none;
}

.delete{
color:red;
text-decoration:none;
}

</style>

</head>

<body>

<h1>Products</h1>

<div class="menu">
<a href="dashboard.php">Dashboard</a>
<a href="add_product_offer.php">Add Product</a>

</div>

<table>

<tr>
<th>ID</th>
<th>Product Name</th>
<th>Price</th>
<th>Quantity</th>
<th>Action</th>
</tr>

<?php

$query = "SELECT * FROM sale_products";
$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td>₹<?php echo $row['new_price']; ?></td>

<td><?php echo $row['quantity']; ?></td>

<td>

<a class="edit" href="edit_product.php?id=<?php echo $row['id']; ?>">
Edit
</a>

|

<a class="delete" href="delete_product.php?id=<?php echo $row['id']; ?>">
Delete
</a>

</td>

</tr>

<?php } ?>

</table>

<br>

<a href="http://localhost/furniture-websiteFinal/">Go to Website</a> |
<a href="http://localhost/furniture-websiteFinal/admin/login.php">Logout</a>

</body>
</html>