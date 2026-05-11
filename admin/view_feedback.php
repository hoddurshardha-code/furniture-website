<!-- <?php
include '../db_connect.php';

$result = mysqli_query($conn,"SELECT * FROM feedback");
?>

<h2>Customer Feedback</h2>

<table border="1" cellpadding="10">

<tr>
<th>ID</th>
<th>Name</th>
<th>Message</th>
</tr>

<?php

while($row = mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['message']; ?></td>

</tr>

<?php } ?>

</table> -->




<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

session_start();
include "db.php";

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM feedback ORDER BY id DESC";
$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Customer Feedback</title>

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
</style>
</head>

<body>

<h2 style="color:rgb(134,171,149);">Customer Feedback</h2>

<a href="dashboard.php"><button>Dashboard</button></a>
<a href="view_products.php"><button>View Products</button></a>
<a href="orders.php"><button>Orders</button></a>

<br><br>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Message</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>
<td><?= $row['id']; ?></td>
<td><?= $row['name']; ?></td>
<td><?= $row['message']; ?></td>
</tr>

<?php } ?>

</table>

<br>

<a href="../index.php">Go to Website |</a>
<a href="http://localhost/furniture-websiteFinal/admin/login.php">Logout</a>

</body>
</html>