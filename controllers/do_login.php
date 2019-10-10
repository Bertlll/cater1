<?php
require_once 'config/database.php';
session_start();
if (isset($_POST['login'])) {
	$email=$_POST['email'];
	$password=$_POST['password'];
	$qry=mysqli_query($conn,"SELECT * FROM `users` where email='$email' AND password='$password' ");
	$row=mysqli_fetch_array($qry);
	$type=$row['level'];
	$active=$row['active'];

	$ifexist=mysqli_query($conn,"SELECT * FROM `users` where email='$email' AND password='$password'");
	$check_user=mysqli_num_rows($ifexist);

	if($check_user==1){

			$_SESSION["type"]=$row['level'];
			$_SESSION["login_user"]=$email;
			$_SESSION["active"]=$row['active'];
			if ($type=="cater" && $active==1) {
				header("location:pages/cater.php");
			}
			if ($type=="cater" && $active==0) {
				echo '<script langauge="javascript">';
				echo 'alert("you are not yet verified")';
				echo '</script>';
			}
			if ($type=="client" && $active==1) {
				header("location:pages/client.php");
			}
			if ($type=="client" && $active==0) {
				echo '<script langauge="javascript">';
				echo 'alert("you are not yet verified")';
				echo "<script>window.open('index.php')</script>";
				echo '</script>';
			}
			
	}

	else {
		echo '<script langauge="javascript">';
		echo 'alert("invalid email or password")';
		echo '</script>';
		//header('location:index.php');
	}
}

?>