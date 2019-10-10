<?php
session_start();
include 'config/database.php';
require_once 'emailController_client.php';

$errors = array();
$email = "";

	if (isset($_POST['add-client'])) {
	$email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        $fname = $conn->real_escape_string($_POST['fname']);
        $lname = $conn->real_escape_string($_POST['lname']);
        $mobile_num = $conn->real_escape_string($_POST['mobile_num']);
        $address_1 = $conn->real_escape_string($_POST['address_1']);
        $address_2 = $conn->real_escape_string($_POST['address_2']);
        $city = $conn->real_escape_string($_POST['city']);
        $zip_code = $conn->real_escape_string($_POST['zip_code']);


        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors2['email'] = "Email address is invalid";
        }


        $emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1";
        $stmt = $conn->prepare($emailQuery);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();
        $userCount = $result->num_rows;
        $stmt->close();

        if ($userCount > 0) {
        	//$errors['email'] = "email already exists";
                echo '<script language="javascript">';
                echo 'alert("email already exists")';
                echo '</script>';
        }

        if (count($errors) === 0) {
        	$password = password_hash($password, PASSWORD_BCRYPT);
                $token = bin2hex(random_bytes(10));
        	$active = 0;
        	$level = "client";


        	$sql = "INSERT INTO `users`(`created`, `email`, `password`, `level`, `token`, `active`) VALUES (NOW(), '$email', '$password', '$level', '$token', '$active')";
        	$stmt = $conn->prepare($sql);
        	//$stmt->bind_param('ssbss', $email, $password, $level, $token, $active);

        	if ($stmt->execute()) {
        		$user_id = $conn->insert_id;
        		$_SESSION['id_number'] = $user_id;
        		$_SESSION['email'] = $email;
        		$_SESSION['password'] = $password;
        		$_SESSION['level'] = $level;
        		$_SESSION['active'] = $active;

        		sendVerificationEmail($email, $token);

                        $sql1 = "INSERT INTO `info_client`(`id_number`, `email`, `fname`, `lname`, `mobile_num`, `address_1`, `address_2`, `city`, `zip_code`) VALUES ('$user_id', '$email', '$fname', '$lname', '$mobile_num', '$address_1', '$address_2', '$city','$zip_code')";

                        mysqli_query($conn, $sql1);
                        echo '<script language="javascript">';
                        echo 'alert("Your account has now created. A verification token is sned to your email'.$email.'.")';
                        echo "window.open('index.php', '_self')";
                        echo '</script>';
        		exit();
        	}
        	else {
        		$errors['db_error'] = "Database error: failed to register";
        	}
        	
        }

	}

	//verify user by token
	function verifyUser($token)
	{
		global $conn;
		$sql = "UPDATE `users` SET `active` = 1 WHERE `token` = '$token'";
                mysqli_query($conn,$sql);
                
	}

?>