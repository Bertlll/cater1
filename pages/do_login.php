<!--LOG-IN CONTROL FOR USER TO GO TO THEIR SITE IF CATER OR CLIENT-->
<?php
require_once 'config/database.php';
session_start();
if (isset($_POST['login'])) {
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$password=mysqli_real_escape_string($conn, $_POST['password']);
	$qry=mysqli_query($conn,"SELECT * FROM `users` where email='$email'");

	if(mysqli_num_rows($qry) > 0){

		while($row = mysqli_fetch_array($qry)){ 
			$type=$row['level'];
			$active=$row['active'];

			if(password_verify($password, $row["password"])){
		
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
					echo 'window.open("index.php")';
					echo '</script>';
				}
			}		
		}

	}
	else {
		echo '<script langauge="javascript">';
		echo 'alert("invalid email or password")';
		echo 'window.open("index.php")';
		echo '</script>';
		//header('location:index.php');
}
}

?>