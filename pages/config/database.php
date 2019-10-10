<?php
$conn = mysqli_connect("localhost","root","","feeds");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>