<?php
include "db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Furniture Mega Sale</title>

<link rel="stylesheet" href="style.css">

<style>

.offer-banner{
background:#388b6f;
color:white;
text-align:center;
padding:35px;
}

.offer-banner h1{
font-size:40px;
}

.product{
padding:40px 8%;
}

.main-txt h3{
text-align:center;
font-size:30px;
margin-bottom:30px;
}

.card-content{
display:grid;
grid-template-columns:repeat(auto-fill,minmax(250px,1fr));
gap:25px;
}

.row{
background:white;
border-radius:10px;
box-shadow:0 4px 10px rgba(0,0,0,0.2);
overflow:hidden;
position:relative;
text-align:center;
padding-bottom:20px;
transition:0.3s;
}

.row:hover{
transform:translateY(-6px);
}

.discount{
position:absolute;
background:#ff0000;
color:white;
padding:5px 10px;
top:10px;
left:10px;
border-radius:5px;
font-size:12px;
font-weight:bold;
}

.row img{
width:100%;
height:200px;
object-fit:contain;
}

.card-body{
padding:15px;
}

.old-price{
text-decoration:line-through;
color:gray;
}

.new-price{
color:#e63946;
font-size:20px;
font-weight:bold;
}

.card-body button{
background:#388b6f;
color:white;
border:none;
padding:10px 20px;
margin-top:10px;
border-radius:5px;
cursor:pointer;
}

.card-body button:hover{
background:#e63946;
}

.stock-btn{
background:#e63946;
color:white;
border:none;
padding:10px 20px;
margin-top:10px;
border-radius:5px;
cursor:not-allowed;
}

</style>
</head>

<body>

<section class="offer-banner">
<h1>🔥 MEGA SALE OFFERS 🔥</h1>
<p>Limited Time Furniture Offers</p>
</section>

<section class="product">

<div class="main-txt">
<h3>Furniture Offers</h3>
</div>

<div class="card-content">

<?php

$query = "SELECT * FROM sale_products ORDER BY id DESC";
$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_assoc($result)){

$price = $row['old_price'];
$discount = $row['discount'];

$final_price = $price - ($price * $discount / 100);

?>

<div class="row">

<?php if($discount > 0){ ?>
<span class="discount"><?php echo $discount; ?>% OFF</span>
<?php } ?>

<img src="images/<?php echo $row['image']; ?>">

<div class="card-body">

<h3><?php echo $row['name']; ?></h3>

<p><?php echo $row['description']; ?></p>

<p class="old-price">₹<?php echo $price; ?></p>

<p class="new-price">₹<?php echo $final_price; ?></p>

<?php if($row['quantity'] > 0){ ?>

<button onclick="addToCart(
'<?php echo $row['name']; ?>',
<?php echo $final_price; ?>,
'images/<?php echo $row['image']; ?>'
)">
Order Now
</button>

<?php } else { ?>

<button class="stock-btn" disabled>
Out of Stock
</button>

<?php } ?>

</div>
</div>

<?php } ?>

</div>

</section>

<script>

function addToCart(name, price, image){

let cart = JSON.parse(localStorage.getItem("cart")) || [];

let existing = cart.find(item => item.name === name);

if(existing){
existing.qty += 1;
}else{
cart.push({
name:name,
price:price,
image:image,
qty:1
});
}

localStorage.setItem("cart", JSON.stringify(cart));

window.location.href="/furniture-websiteFinal/cart.php";

}

</script>

</body>
</html>