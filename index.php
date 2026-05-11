
<?php
error_reporting(0);
include("db_connect.php");

$p1 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT price FROM products WHERE id=1"));
$p2 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT price FROM products WHERE id=2"));
$p3 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT price FROM products WHERE id=3"));
$p4 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT price FROM products WHERE id=4"));
$p5 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT price FROM products WHERE id=5"));
$p6 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT price FROM products WHERE id=6"));
$p7 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT price FROM products WHERE id=7"));
$p8 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT price FROM products WHERE id=8"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interior Website</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        html { scroll-behavior: smooth; }
    </style>
</head>
<body>

<div class="header">
    <nav>
    <input type="checkbox" id="show-search">
    <input type="checkbox" id="show-menu">

    <label for="show-menu" class="menu-icon">
        <i class="fas fa-bars"></i>
    </label>

    <div class="content">
        <div class="logo">
            <a href="#home"><img src="./images/logo.png" alt=""></a>
        </div>

        <ul class="links">
            <li><a href="#home" id="first">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#product">Products</a></li>
            <li><a href="#footer">Contact</a></li>
            <li><a href="#review">Reviews</a></li>
            <li><a href="track_order.php">Track Order</a></li>
        </ul>
    </div>

    <!-- SEARCH ICON -->
    <div class="nav-icons">

    <!-- <label for="show-search" class="search-icon">
        <i class="fas fa-search"></i>
    </label> -->

    <a href="cart.php" class="cart-icon">
        <i class="fa-solid fa-cart-shopping"></i>
        <span id="cart-count" class="cart-badge">5</span>
    </a>

</div>


    


</nav>

</div>
<!-- Header End -->

<!-- Home Section Start -->
<div class="home" id="home">
    <div class="main-text">
        <h1>Discover The Best <br>Furniture For You</h1>
        <p>Explore our exclusive collection of modern and timeless furniture designed to enhance your living space.</p>
        <p>Our mission is to provide furniture that transforms houses into homes.</p>
        <button id="btn"><a href="#product" style="color:white;text-decoration:none;">Shop Now!</a></button>
    </div>
</div>
<!-- Home Section End -->

<!-- Offers Section -->
<section class="offers">
    <div class="offer-content">
        <div class="row">
            <i class="fa-solid fa-truck-fast"></i>
            <h3>Free Delivery</h3>
            <p>Enjoy free delivery on all orders with safe and fast shipping right to your doorstep.</p>
        </div>
        <div class="row">
            <i class="fa-solid fa-headset"></i>
            <h3>Support 24/7</h3>
            <p>Our customer support team is available 24/7 to help you with any questions or issues.</p>
        </div>
        <div class="row">
            <i class="fa-solid fa-rotate-left"></i>
            <h3>30 Day Return</h3>
            <p>Shop with confidence! You can return or exchange products within 30 days of purchase.</p>
        </div>
        <div class="row">
            <i class="fa-solid fa-cart-shopping"></i>
            <h3>Secure Shopping</h3>
            <p>Your payments and personal information are fully protected with secure checkout and encryption.</p>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about" id="about">
    <div class="about-img">
        <img src="./images/about-img.png" alt="">
    </div>
    <div class="about-text">
        <h3>Furniture service About us</h3>
        <p>We provide high-quality and stylish furniture designed to make your home comfortable and beautiful. From sofas and chairs to modern designs, we offer reliable service, affordable prices, and customer satisfaction.</p>
        <!-- <button id="about-btn">Read More...</button> -->
        <a href="about.html" class="read-btn">Read More...</a>
    </div>
</section>

<!-- Product Section -->
<section class="product" id="product">
    <div class="main-txt">
        <h3>Products</h3>
    </div>

    <div class="card-content">
        <div class="row">
            <img src="./images/p1.png" alt="">
            <div class="card-body">
                <h3>Modern Grey Fabric Sofa</h3>
                <p>A comfortable and stylish grey sofa perfect for modern living rooms with a soft fabric finish.</p>
		<h5>Price ₹<?php echo $p1['price']; ?></h5>                
		<!-- <button onclick="addToCart('Modern Grey Fabric Sofa', 22999)">Add to Cart</button> -->
               <button onclick="addToCart(this,1,'Modern Grey Fabric Sofa',<?php echo $p1['price']; ?>)">
Add to Cart
</button>
            </div>
        </div>
        <div class="row">
            <img src="./images/p2.png" alt="">
            <div class="card-body">
                <h3>Sky Blue Tufted Accent Chair</h3>
                <p>A cozy tufted chair with a classy blue look, ideal for reading corners or bedrooms.</p>
                <h5>Price ₹<?php echo $p2['price']; ?></h5>
               <button onclick="addToCart(this,2,'Sky Blue Tufted Accent Chair',<?php echo $p2['price']; ?>)">
Add to Cart
</button>
            </div>
        </div>
        <div class="row">
            <img src="./images/p3.png" alt="">
            <div class="card-body">
                <h3>Classic Brown Tufted Sofa</h3>
                <p>A premium-style brown sofa with elegant tufted design for a luxurious interior feel.</p>
                <h5>Price ₹<?php echo $p3['price']; ?></h5>
                <button onclick="addToCart(this,3,'Classic Brown Tufted Sofa',<?php echo $p3['price']; ?>)">
Add to Cart
</button>
            </div>
        </div>
        <div class="row">
            <img src="./images/p4.png" alt="">
            <div class="card-body">
                <h3>Yellow Lounge Chair with Ottoman</h3>
                <p>A bright and relaxing lounge chair set with a matching ottoman for extra comfort.</p>
                <h5>Price ₹<?php echo $p4['price']; ?></h5>
                <button onclick="addToCart(this,4,'Yellow Lounge Chair with Ottoman',<?php echo $p4['price']; ?>)">
Add to Cart
</button>
            </div>
        </div>
    </div>

    <div class="card-content">
        <div class="row">
            <img src="./images/p5.png" alt="">
            <div class="card-body">
                <h3>Scandinavian Grey Dining Chair</h3>
                <p>A minimal and modern dining chair with wooden legs and a soft cushioned seat.</p>
                <h5>Price ₹<?php echo $p5['price']; ?></h5>
<button onclick="addToCart(this,5,'Scandinavian Grey Dining Chair',<?php echo $p5['price']; ?>)">
Add to Cart
</button>           </div>
        </div>
        <div class="row">
            <img src="./images/p6.png" alt="">
            <div class="card-body">
                <h3>White Chesterfield Style Sofa</h3>
                <p>A classic white sofa with button-tufted design, perfect for elegant living spaces.</p>
                <h5>Price ₹<?php echo $p6['price']; ?></h5>
<button onclick="addToCart(this,6,'White Chesterfield Style Sofa',<?php echo $p6['price']; ?>)">
Add to Cart
</button>           </div>
        </div>
        <div class="row">
            <img src="./images/p7.png" alt="">
            <div class="card-body">
                <h3>Velvet Wine Accent Chair</h3>
                <p>A stylish velvet chair in deep wine color, adding a premium touch to any room.</p>
                <h5>Price ₹<?php echo $p7['price']; ?></h5>
<button onclick="addToCart(this,7,'Velvet Wine Accent Chair',<?php echo $p7['price']; ?>)">
Add to Cart
</button>           </div>
        </div>
        <div class="row">
            <img src="./images/p8.png" alt="">
            <div class="card-body">
                <h3>Modern Yellow Armchair</h3>
                <p>A trendy and comfortable armchair with a bold yellow color for modern interiors.</p>
                <h5>Price ₹<?php echo $p8['price']; ?></h5>
<button onclick="addToCart(this,8,'Modern Yellow Armchair',<?php echo $p8['price']; ?>)">
Add to Cart
</button>
  
   </div>
        </div>
    </div>
</section>


<p id="noResultMessage" style="display:none; text-align:center; font-size:18px; margin-top:20px;">
    No products found.
</p>







<!-- Banner -->
<div class="banner">
    <div class="banner-content">
        <h5>Get Discount Up To 50%</h5>
        <h3>Best Deal For Week</h3>
        <p>Get up to 50% off this week and get offer <br>Don't miss</p>

        <a href="offer.php" class="banner-btn">Order Now</a>
    </div>
</div>

<!-- Gallery -->
<div class="gallery">
    <h3>Our Gallery</h3>
    <div class="gallery-img">
        <div class="img1">
            <img src="./images/g1.png" alt="">
        </div>
        <div class="img1">
            <img src="./images/g2.png" alt="">
            <img src="./images/g3.png" alt="">
        </div>
    </div>
</div>

<!-- Review Section -->
<section class="review" id="review">
    <div class="main-txt">
        <h3>Customers <span>Review</span></h3>
    </div>

    <div class="review-content">
        <div class="box">
            <div class="img"><img src="./images/pic-1.png" alt=""></div>
            <h3>Karan Jaiswal</h3>
            <div class="star">
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
            </div>
            <p>“The quality of the chair is really good and it looks exactly like the images shown on the website. It is very comfortable and perfect for my study room. Delivery was also on time. Totally worth the price!”</p>
        </div>
        <div class="box">
            <div class="img"><img src="./images/pic-2.png" alt=""></div>
            <h3>Ananya Sharma</h3>
            <div class="star">
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
            </div>
            <p>“I ordered the sofa for my living room and it looks amazing. The fabric feels premium and the design is very modern. My family loved it and the seating is very comfortable.”</p>
        </div>
        <div class="box">
            <div class="img"><img src="./images/pic-3.png" alt=""></div>
            <h3>Rahul Mehta</h3>
            <div class="star">
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
            </div>
            <p>“Beautiful design and very comfortable to sit on. It gives a classy look to my room. The product was well packed and installation was easy. I am very happy with the purchase.”</p>
        </div>
    </div>
</section>

<!-- Footer -->
<footer id="footer">
    <div class="footer-content">
        <div class="logo">
            <img src="./images/logo.png" alt="">
        </div>

        <p>We offer stylish and comfortable furniture to make your home beautiful and cozy. Shop with confidence and enjoy quality products, secure payments, and reliable service.</p>
    <div class="social-links">
    <a href="https://t.me/@shardhahoddur25" target="_blank">
        <i class="fa-brands fa-telegram"></i>
    </a>
    <a href="https://www.instagram.com/urfav_sharuu_" target="_blank">
        <i class="fa-brands fa-instagram"></i>
    </a>
    <a href="https://www.youtube.com/@shardhahoddur88" target="_blank">
        <i class="fa-brands fa-youtube"></i>
    </a>

</div>

    </div>
    <hr>
    <div class="footer-bottom-content">
        <p>Designed By <a href="#">SH Coding</a></p>
        <div class="copyright">
            <p>
            © Copyright SH Coding. All Rights Reserved By 
            <a href="admin/login.php" class="admin-link">Admin</a>
            </p>
            <!-- <a href="track_order.php">Track Order</a> -->
        </div>
    </div>
</footer>

<a href="#home" class="arrow"><i><img src="./images/up-arrow.png" alt="" width="50px"></i></a>

<script src="script.js"></script>

<script>
function addToCart(button,id,name,price){

let cart = JSON.parse(localStorage.getItem("cart")) || [];

let existing = cart.find(item => item.id === id);

if(existing){
existing.qty += 1;
}else{
cart.push({
id:id,
name:name,
price:price,
qty:1
});
}

localStorage.setItem("cart",JSON.stringify(cart));

button.innerText="Added ✓";
button.style.backgroundColor="#2e8b57";
button.style.color="white";
button.disabled=true;

updateCartCount();
}

</script>


<script>
function searchProducts() {
    let input = document.getElementById("searchInput").value.toLowerCase();
    let products = document.getElementsByClassName("row");
    let found = false;

    for (let i = 0; i < products.length; i++) {
        let productName = products[i].innerText.toLowerCase();

        if (productName.includes(input)) {
            products[i].style.display = "block";
            found = true;
        } else {
            products[i].style.display = "none";
        }
    }

    // Optional: show message if nothing found
    let noResult = document.getElementById("noResultMessage");
    if (!found) {
        noResult.style.display = "block";
    } else {
        noResult.style.display = "none";
    }
}
</script>

<script>
function updateCartCount() {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    let totalQty = 0;

    cart.forEach(item => {
        totalQty += item.qty;
    });

    let badge = document.getElementById("cart-count");

    if (totalQty > 0) {
        badge.innerText = totalQty;
        badge.style.display = "flex";
    } else {
        badge.style.display = "none";
    }
}

updateCartCount();
</script>


</body>
</html>

 
  




