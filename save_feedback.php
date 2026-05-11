<?php

include 'db_connect.php';

$name = $_POST['name'];
$message = $_POST['message'];

$sql = "INSERT INTO feedback (name, message)
VALUES ('$name','$message')";

mysqli_query($conn,$sql);

echo "<script>
alert('Thank you for your feedback!');
window.location.href='index.html';
</script>";

?>