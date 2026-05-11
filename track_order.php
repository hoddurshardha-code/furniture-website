<?php
include "db_connect.php";

$order = null;

if(isset($_POST['track'])){

    $order_id = $_POST['order_id'];

    $sql = "SELECT * FROM orders WHERE order_id='$order_id'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){
        $order = mysqli_fetch_assoc($result);
    } else {
        $error = "Order not found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Track Order</title>
<link rel="stylesheet" href="style.css">

<style>
body{
    font-family: Arial;
    background:#f4f4f4;
    padding:40px;
    text-align:center;
}

.track-box{
    background:white;
    padding:30px;
    max-width:500px;
    margin:auto;
    border-radius:10px;
}

input{
    padding:10px;
    width:80%;
    margin-top:10px;
}

button{
    padding:10px 20px;
    background:#388b6f;
    color:white;
    border:none;
    margin-top:10px;
}
</style>

</head>

<body>

<div class="track-box">

<h2>Track Your Order</h2>

<form method="POST">

<input type="text" name="order_id" placeholder="Enter Order ID" required>

<br>

<button name="track">Track Order</button>

</form>

<br>

<?php if(isset($error)){ ?>
<p style="color:red;"><?php echo $error; ?></p>
<?php } ?>

<?php if($order){ ?>

<h3>Order Details</h3>

<p><b>Order ID:</b> <?php echo $order['order_id']; ?></p>

<p><b>Name:</b> <?php echo $order['customer_name']; ?></p>

<p><b>Status:</b> <?php echo $order['status']; ?></p>

<p><b>Total Amount:</b> ₹<?php echo $order['total_amount']; ?></p>

<?php } ?>

</div>

</body>
</html>