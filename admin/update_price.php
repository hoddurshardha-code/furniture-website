<?php

include("db.php");

$id = $_POST['id'];
$price = $_POST['price'];

$query = "UPDATE products SET price='$price' WHERE id='$id'";

mysqli_query($conn,$query);

header("Location:view_products.php");

?>