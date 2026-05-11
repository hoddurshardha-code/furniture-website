<?php
include "../db.php";

if(isset($_POST['add_product'])){

$name = $_POST['name'];
$description = $_POST['description'];
$old_price = $_POST['old_price'];
$discount = $_POST['discount'];

$image = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];

move_uploaded_file($tmp,"../images/".$image);

$query = "INSERT INTO sale_products(name,description,old_price,discount,image)
VALUES('$name','$description','$old_price','$discount','$image')";

mysqli_query($conn,$query);

echo "<script>alert('Product Added Successfully');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Add Offer Product</title>

<style>

body{
font-family:Arial;
background:#f3f3f3;
margin:0;
padding:0;
}

h1{
color:#6c8e85;
margin-left:40px;
margin-top:20px;
}

.menu{
margin-left:40px;
margin-top:10px;
}

.menu a{
background:#388b6f;
color:white;
padding:10px 20px;
text-decoration:none;
margin-right:5px;
display:inline-block;
}

.menu a:hover{
background:#2f7059;
}

.form-box{
width:600px;
background:#eaeaea;
padding:30px;
margin-left:40px;
margin-top:20px;
}

.form-box label{
display:block;
margin-top:15px;
font-size:16px;
}

.form-box input{
width:100%;
padding:10px;
margin-top:5px;
border:1px solid #ccc;
}

.form-box button{
background:#388b6f;
color:white;
border:none;
padding:10px 20px;
margin-top:20px;
cursor:pointer;
}

.form-box button:hover{
background:#2f7059;
}

.footer-links{
margin-left:40px;
margin-top:20px;
}

</style>

</head>

<body>

<h1>Add New Product</h1>

<div class="menu">
<a href="dashboard.php">Dashboard</a>
<a href="view_products.php">View Products</a>
<a href="orders.php">Orders</a>
</div>

<div class="form-box">

<form method="POST" enctype="multipart/form-data">

<label>Product Name</label>
<input type="text" name="name" required>

<label>Description</label>
<input type="text" name="description" required>

<label>Old Price</label>
<input type="number" name="old_price" required>

<label>Discount (%)</label>
<input type="number" name="discount" placeholder="Enter discount %" required>

<label>Product Image</label>
<input type="file" name="image" required>

<button type="submit" name="add_product">Add Product</button>

</form>

</div>

<div class="footer-links">
<a href="../index.php">Go to Website</a> |
<a href="logout.php">Logout</a>
</div>

</body>
</html>