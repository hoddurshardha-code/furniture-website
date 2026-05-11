<?php
session_start();
include "db.php";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin_users 
            WHERE username='$username' 
            AND password='$password'";

    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php");
    }else{
        $error = "Invalid Login";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>

<style>
body{
font-family:Arial;
background:#f3f3f3;
display:flex;
justify-content:center;
align-items:center;
height:100vh;
}

.box{
background:white;
padding:30px;
border-radius:10px;
width:300px;
text-align:center;
}

input{
width:100%;
padding:10px;
margin:10px 0;
}

button{
padding:10px;
background:#388b6f;
color:white;
border:none;
cursor:pointer;
}

button:hover{
    background:#2f6f59;
}
</style>
</head>

<body>

<div class="box">

<h2>Admin Login</h2>

<?php if(isset($error)) echo $error; ?>

<form method="POST">

<input type="text" name="username" placeholder="Username" required>

<input type="password" name="password" placeholder="Password" required>


<button name="login">Login</button>

</form>
<!-- <form method="POST" action="login_process.php">
    <label>Username</label>
    <input type="text" name="username" placeholder="Enter Username" required>

    <label>Password</label>
    <input type="password" name="password" placeholder="Enter Password" required>

    <button type="submit">Login</button>
</form> -->

</div>

</body>
</html>