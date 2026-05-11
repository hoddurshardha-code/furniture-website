<?php
include("db.php");

foreach($_POST['price'] as $id => $price){

mysqli_query($conn,"UPDATE products SET price='$price' WHERE id='$id'");

}

header("Location:update_prices.php");

?>