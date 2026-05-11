<?php
include("db_connect.php");

$data = json_decode(file_get_contents("php://input"), true);

$ids = $data['ids'];

$ids = implode(",", $ids);

$query = "SELECT id, product_name, price FROM products WHERE id IN ($ids)";
$result = mysqli_query($conn,$query);

$products = [];

while($row = mysqli_fetch_assoc($result)){
$products[$row['id']] = $row;
}

echo json_encode($products);
?>