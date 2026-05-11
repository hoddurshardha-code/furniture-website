<?php
require 'db_connect.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$successMessage = "";
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // ================= CUSTOMER DATA =================
$customer_name = $_POST['customer_name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];

    // ================= ORDER ID =================
    $order_id = "ORD" . date("YmdHis");

    // ================= CART DATA =================
    if(!isset($_POST['cartData']) || empty($_POST['cartData'])){
        echo "Cart data not received!";
        exit();
    }

$cartData = json_decode($_POST['cartData'], true);

$total_items = 0;
$total_amount = 0;

foreach ($cartData as $item) {

    $qty = $item['qty'];
    $price = $item['price'];

    $total_items += $qty;
    $total_amount += ($price * $qty);
}
    if(!is_array($cartData) || empty($cartData)){
        echo "Cart is empty!";
        exit();
    }

    // ================= ORDER CALCULATION =================
    $orderDetails = "";
    $totalAmount = 0;
    $totalItems = 0;

    foreach($cartData as $item){

        $productName = $item['name'];
        $price = $item['price'];
        $qty = $item['qty'];

        $subtotal = $price * $qty;

        $totalAmount += $subtotal;
        $totalItems += $qty;

        $orderDetails .=
"Product: $productName
Quantity: $qty
Price: ₹$price
Subtotal: ₹$subtotal

-----------------------
";
    }

    // ================= EMAIL SECTION =================
    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPDebug = 0;

        $mail->Username = 'hoddurshardha@gmail.com';
        $mail->Password = 'your_password'; // Gmail App Password

        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('hoddurshardha@gmail.com', 'SH Furniture');
        $mail->addAddress($email, $customer_name);
        $mail->addAddress("hoddurshardha@gmail.com");
        $mail->isHTML(false);
        $mail->Subject = 'Order Confirmation - SH Furniture';

        // ✅ FULL EMAIL CONTENT
        $mail->Body =
"Hello $customer_name,

Thank you for shopping with SH Furniture❤️

==============================
CUSTOMER DETAILS
==============================
Name: $customer_name
Email: $email
Mobile: $mobile
Address: $address

==============================
ORDER DETAILS
==============================
Order ID: $order_id

$orderDetails
Total Items: $totalItems
Total Amount: ₹$totalAmount

==============================
Your order has been successfully placed.

Regards,
SH Furniture Team";



// ================= SAVE ORDER TO DATABASE =================


$status = "Pending";

$order_details = $orderDetails;

$stmt = $conn->prepare("
INSERT INTO orders
(order_id, customer_name, email, mobile, address, total_items, total_amount, order_details, status)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
");

$stmt->bind_param(
"sssssisss",
$order_id,
$customer_name,
$email,
$mobile,
$address,
$total_items,
$total_amount,
$order_details,
$status
);

$stmt->execute();
$stmt->close();



        $mail->send();
echo "<script>localStorage.removeItem('cart');</script>";
        $successMessage = "✅ Order placed successfully! Confirmation email sent.";

    } catch (Exception $e) {

        $errorMessage = "❌ Email could not be sent. {$mail->ErrorInfo}";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Order Status</title>

<style>
body{
    font-family: Arial;
    background:#f3f3f3;
    text-align:center;
    padding:40px;
}

.box{
    max-width:500px;
    margin:auto;
    background:white;
    padding:25px;
    border-radius:10px;
}

h1{
    color:#388b6f;
}

.btn{
    margin-top:20px;
    padding:10px 20px;
    background:#388b6f;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
}
</style>
</head>

<body>

<div class="box">

<h1>Order Status</h1>

<?php if($successMessage!=""){ ?>
<p><?php echo $successMessage; ?></p>
<?php } else { ?>
<p><?php echo $errorMessage; ?></p>
<?php } ?>

<button class="btn" onclick="goHome()">Go to Home</button>
<a href="feedback.php">
<button class="btn">Give Feedback</button>
</a>

</div>

<script>
localStorage.removeItem("cart");

function goHome(){
    window.location.href="http://localhost/furniture-websiteFinal/";
}
</script>

</body>
</html>














<!-- //     $orderDetails = "";
//     $totalAmount = 0;
//     $totalItems = 0;

//     // foreach ($cartData as $item)
//      if(!empty($cartData)){
//     foreach ($cartData as $item) {

//         $productName = $item['name'];
//         $price = $item['price'];
//         $qty = $item['qty'];

//         $subtotal = $price * $qty;

//         $totalAmount += $subtotal;
//         $totalItems += $qty;

//         $orderDetails .= "
// Product: $productName
// Quantity: $qty
// Price: ₹$price
// Subtotal: ₹$subtotal

// ";
//     }

// } else {
//     header("Location: cart.html");
//     exit();
// } -->
