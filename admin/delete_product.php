
<?php
include "../db.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM sale_products WHERE id=$id");
}

header("Location: view_products.php");
exit();
?>