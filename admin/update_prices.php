<?php
include("db.php");

$result = mysqli_query($conn,"SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
<title>Update Product Prices</title>

<style>

body{
font-family: Arial, sans-serif;
background:#f4f6f9;
margin:0;
padding:0;
}

.container{
width:900px;
margin:20px auto;
background:white;
padding:20px 30px;
border-radius:8px;
box-shadow:0 4px 12px rgba(0,0,0,0.1);
}

h2{
text-align:center;
color:#2f7f68;
margin:0 0 20px 0;
}

table{
width:100%;
border-collapse:collapse;
border:1px solid #ddd;
}

th{
background:#3f8f74;
color:white;
padding:8px;
text-align:center;
border:1px solid #ddd;
}

td{
padding:8px;
text-align:center;
border:1px solid #ddd;
}

tr:hover{
background:#f7f7f7;
}

input{
padding:4px;
width:80px;
border:1px solid #ccc;
border-radius:4px;
text-align:center;
}

.update-btn{
display:block;
margin:20px auto 0;
padding:12px 25px;
background:#3f8f74;
color:white;
border:none;
border-radius:5px;
cursor:pointer;
font-size:15px;
}

.update-btn:hover{
background:#2f6e58;
}
</style>

</head>

<body>

<div class="container">

<h2>Update Product Prices</h2>

<form method="POST" action="save_prices.php">

<table>

<tr>
<th>ID</th>
<th>Product Name</th>
<th>Price</th>
<th>New Price</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['product_name']; ?></td>

<td>₹<?php echo $row['price']; ?></td>

<td>
<input type="number" name="price[<?php echo $row['id']; ?>]" value="<?php echo $row['price']; ?>">
</td>

</tr>

<?php } ?>

</table>

<button class="update-btn">Update All Prices</button>

</form>

</div>

</body>
</html>