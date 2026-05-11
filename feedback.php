<?php
include 'db.php';

if(isset($_POST['submit'])){

$name = $_POST['name'];
$message = $_POST['message'];

$query = "INSERT INTO feedback(name,message) VALUES('$name','$message')";
mysqli_query($conn,$query);

echo "<p style='color:green;text-align:center;'>Feedback Submitted Successfully</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Customer Feedback</title>

<style>

body{
font-family: Arial;
background:#f4f6f9;
margin:0;
padding:40px;
}

.container{
width:400px;
margin:auto;
background:white;
padding:30px;
border-radius:8px;
box-shadow:0 4px 10px rgba(0,0,0,0.1);
}

h2{
text-align:center;
color:#2f7f68;
margin-bottom:20px;
}

label{
font-weight:bold;
}

input, textarea{
width:100%;
padding:8px;
margin-top:5px;
margin-bottom:15px;
border:1px solid #ccc;
border-radius:4px;
}

button{
width:100%;
padding:10px;
background:#3f8f74;
color:white;
border:none;
border-radius:5px;
cursor:pointer;
}

button:hover{
background:#2f6e58;
}

</style>

</head>

<body>

<div class="container">

<h2>Customer Feedback</h2>

<form method="POST">

<label>Name:</label>
<input type="text" name="name" required>

<label>Message:</label>
<textarea name="message" rows="4" required></textarea>

<button type="submit" name="submit">Submit Feedback</button>

</form>

</div>

</body>
</html>