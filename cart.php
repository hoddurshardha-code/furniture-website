<?php
include("db_connect.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Your Cart</title>

<style>

body{
font-family:Arial;
background:#f3f3f3;
padding:20px;
}

h1{
text-align:center;
color:#388b6f;
}

.cart-container{
max-width:900px;
margin:auto;
background:white;
padding:20px;
border-radius:10px;
}

table{
width:100%;
border-collapse:collapse;
}

th,td{
padding:10px;
text-align:center;
border-bottom:1px solid #ddd;
}

th{
background:#388b6f;
color:white;
}

.btn{
background:#cc0000;
color:white;
border:none;
padding:6px 12px;
cursor:pointer;
}

.total{
text-align:right;
font-size:20px;
margin-top:20px;
color:#388b6f;
font-weight:bold;
}

.order-btn{
display:block;
margin:20px auto;
padding:10px 20px;
background:#388b6f;
color:white;
border:none;
cursor:pointer;
}

</style>

</head>

<body>

<h1>Your Cart</h1>

<div class="cart-container">

<table id="cartTable">
<tr>
<th>Product</th>
<th>Price</th>
<th>Quantity</th>
<th>Remove</th>
</tr>
</table>

<div class="total" id="total"></div>

<button class="order-btn" onclick="goToCheckout()">Order Now</button>

</div>

<script>

let cart = JSON.parse(localStorage.getItem("cart")) || [];

let table = document.getElementById("cartTable");

let total = 0;

function renderCart(){

table.innerHTML = `
<tr>
<th>Product</th>
<th>Price</th>
<th>Quantity</th>
<th>Remove</th>
</tr>
`;

total = 0;

cart.forEach((item,index)=>{

let row = table.insertRow();

row.insertCell(0).innerText = item.name;

let itemTotal = item.price * item.qty;

row.insertCell(1).innerText = "₹"+itemTotal.toLocaleString("en-IN");

let qtyCell = row.insertCell(2);

qtyCell.innerHTML =
`<input type="number" min="1" value="${item.qty}"
onchange="updateQty(${index},this.value)">`;

let removeCell = row.insertCell(3);

removeCell.innerHTML =
`<button class="btn" onclick="removeItem(${index})">Remove</button>`;

total += itemTotal;

});

document.getElementById("total").innerText =
"Total: ₹"+total.toLocaleString("en-IN");

}

function updateQty(index,value){

cart[index].qty = parseInt(value);

localStorage.setItem("cart",JSON.stringify(cart));

renderCart();

}

function removeItem(index){

cart.splice(index,1);

localStorage.setItem("cart",JSON.stringify(cart));

renderCart();

}

function goToCheckout(){

if(cart.length === 0){
alert("Your cart is empty");
return;
}

window.location.href="checkout.html";

}

renderCart();

</script>

</body>
</html>