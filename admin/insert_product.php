<?php

include '../db_connect.php';

$name = $_POST['product_name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];

$sql = "INSERT INTO products(product_name,price,quantity)
VALUES('$name','$price','$quantity')";

mysqli_query($conn,$sql);

header("Location: view_products.php");

?>