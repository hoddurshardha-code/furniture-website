<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

session_start();
include "db.php";

/* Protect Admin Page */
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

/* Fetch Orders */
$sql = "SELECT * FROM orders ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<style>
button{
padding:10px;
background:#388b6f;
color:white;
border:none;
cursor:pointer;
}
button:hover{
    background:#2f6f59;
}

body{
    font-family: Arial;
    background:#f4f4f4;
    padding:20px;
}
table{
    width:100%;
    border-collapse:collapse;
    background:white;
}
th,td{
    padding:10px;
    border:1px solid #ccc;
}
th{
    background:#388b6f;
    color:white;
}
a{
    text-decoration:none;
    color:#388b6f;
}
.btn{
background:#3f8f74;
color:white;
padding:10px 15px;
text-decoration:none;
margin-right:5px;
display:inline-block;
font-weight:bold;
}
</style>
</head>

<body>

<!-- <h2>🛒 Admin Dashboard - Orders</h2>


<a href="add_product.php">
<button>Add New Product</button>
</a>

<a href="view_products.php">
<button>View Products</button>
</a>
<br><br> -->

<h2 style="color:rgb(134, 171, 149);text-decoration:none;">🛒Admin Dashboard</h2>

<a href="add_product_offer.php">
<button>Add New Product</button>
</a>

<a href="view_products.php">
<button>View Products</button>
</a>

<!-- <br><br> -->

<a href="view_feedback.php">
<button>Feedback</button>
</a>

<br><br>

<a href="update_prices.php" class="btn">Update Product Prices</a>

<table>
<tr>
<th>ID</th>
<th>Order ID</th>
<th>Name</th>
<th>Email</th>
<th>Mobile</th>
<th>Total Amount</th>
<th>Status</th>
<th>Action</th>

</tr>
<!-- <th>Date</th> -->


<?php while($row = mysqli_fetch_assoc($result)){ ?>


<tr>
    <td><?= $row['id']; ?></td>
    <td><?= $row['order_id']; ?></td>
    <td><?= $row['customer_name']; ?></td>
    <td><?= $row['email']; ?></td>
    <td><?= $row['mobile']; ?></td>
    <td>₹<?= $row['total_amount']; ?></td>
    <td><?php echo $row['status']; ?></td>

    <td>
<a href="update_status.php?id=<?php echo $row['id']; ?>">Update Status</a>
</td>
</tr>

<?php } ?>

</table>
<br>
<a href="http://localhost/furniture-websiteFinal/">Go to Website</a> |
<a href="http://localhost/furniture-websiteFinal/admin/login.php">Logout</a>
</body>
</html>