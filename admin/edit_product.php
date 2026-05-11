<?php
include "../db.php";

$id = $_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM sale_products WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update_product'])){

$name = $_POST['name'];
$description = $_POST['description'];
$old_price = $_POST['old_price'];
$discount = $_POST['discount'];
$quantity = $_POST['quantity'];

$image = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];

if($image != ""){
move_uploaded_file($tmp,"../images/".$image);

$query = "UPDATE sale_products SET 
name='$name',
description='$description',
old_price='$old_price',
discount='$discount',
quantity='$quantity',
image='$image'
WHERE id=$id";

}else{

$query = "UPDATE sale_products SET 
name='$name',
description='$description',
old_price='$old_price',
discount='$discount',
quantity='$quantity'
WHERE id=$id";

}

mysqli_query($conn,$query);

echo "<script>
alert('Product Updated Successfully');
window.location='view_products.php';
</script>";

}
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Product</title>

<style>

body{
font-family:Arial;
background:#f3f3f3;
padding:30px;
}

form{
background:white;
padding:25px;
width:500px;
box-shadow:0 4px 10px rgba(0,0,0,0.2);
}

input{
width:100%;
padding:10px;
margin-top:10px;
margin-bottom:15px;
}

button{
background:#388b6f;
color:white;
border:none;
padding:10px 20px;
cursor:pointer;
}

</style>

</head>

<body>

<h2>Edit Product</h2>

<form method="POST" enctype="multipart/form-data">

<label>Product Name</label>
<input type="text" name="name" value="<?php echo $row['name']; ?>" required>

<label>Description</label>
<input type="text" name="description" value="<?php echo $row['description']; ?>" required>

<label>Old Price</label>
<input type="number" name="old_price" value="<?php echo $row['old_price']; ?>" required>

<label>Discount (%)</label>
<input type="number" name="discount" value="<?php echo $row['discount']; ?>" required>

<label>Quantity</label>
<input type="number" name="quantity" value="<?php echo $row['quantity']; ?>" required>

<label>Replace Image</label>
<input type="file" name="image">

<button name="update_product">Update Product</button>

</form>

</body>
</html>