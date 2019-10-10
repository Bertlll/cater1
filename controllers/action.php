<?php
require_once '../config/database.php';
//session_start();
$user_check = $_SESSION["login_user"];
$qry = mysqli_query($conn, "SELECT * FROM `users` where email='$user_check'");
$row = mysqli_fetch_assoc($qry);
$login_session = $row['email'];
$password = $row['password'];

$qry1 = mysqli_query($conn, "SELECT * FROM `info_client` where email='$user_check'");
$row1 = mysqli_fetch_assoc($qry1);
$fname = $row1['fname'];
$lname = $row1['lname'];

$qry2 = mysqli_query($conn, "SELECT * FROM `info_cater` where email='$user_check'");
$row2 = mysqli_fetch_assoc($qry2);
$id_number = $row2['id_number'];
$comp_name = $row2['comp_name'];
?>