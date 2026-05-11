<?php
include 'db.php';

$id = $_GET['id'];

$query = "SELECT * FROM orders WHERE id='$id'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
<title>Update Order Status</title>

<style>

body{
font-family: Arial;
background:#f4f6f9;
margin:0;
padding:40px;
}

.container{
width:450px;
margin:auto;
background:white;
padding:30px;
border-radius:8px;
box-shadow:0 4px 10px rgba(0,0,0,0.1);
text-align:center;
}

h2{
margin-bottom:20px;
color:#2f7f68;
}

select{
width:200px;
padding:8px;
margin-top:10px;
}

button{
margin-top:20px;
padding:10px 20px;
background:#3f8f74;
color:white;
border:none;
border-radius:5px;
cursor:pointer;
}

button:hover{
background:#2f6e58;
}

.success{
margin-top:15px;
color:green;
font-weight:bold;
}

.back{
display:inline-block;
margin-top:20px;
text-decoration:none;
color:#333;
}

</style>

</head>

<body>

<div class="container">

<h2>Update Order Status</h2>

<p><b>Order ID:</b> <?php echo $row['order_id']; ?></p>

<p><b>Customer:</b> <?php echo $row['customer_name']; ?></p>
<form method="POST">

<select name="status">

<option value="pending" <?php if($row['status']=="pending") echo "selected"; ?>>Pending</option>

<option value="shipped" <?php if($row['status']=="shipped") echo "selected"; ?>>Shipped</option>

<option value="delivered" <?php if($row['status']=="delivered") echo "selected"; ?>>Delivered</option>

</select>

<br>

<button type="submit" name="update">Update Status</button>

</form>

<?php

if(isset($_POST['update'])){

$status = $_POST['status'];

$update = "UPDATE orders SET status='$status' WHERE id='$id'";
mysqli_query($conn,$update);

echo "<p class='success'>Status Updated Successfully</p>";

}
?>

<a href="http://localhost/furniture-websiteFinal/admin/dashboard.php" class="back">← Back to Orders</a>

</div>

</body>
</html>