<?php

$conn = new mysqli("localhost","root","","furniture_db");

if($conn->connect_error){
    die("Database Connection Failed");
}

?>