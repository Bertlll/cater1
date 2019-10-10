<?php
session_start();
include 'config/database.php';
include 'emailController_cater.php';

$errors = array();
$email = "";

        if (isset($_POST['add-cater'])) {
        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);
        $password2 = $conn->real_escape_string($_POST['password2']);

        $comp_name = $conn->real_escape_string($_POST['comp_name']);
        $landline_num = $conn->real_escape_string($_POST['landline_num']);
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
                $token = bin2hex(random_bytes(10));
                $active = 0;
                $level = "cater";


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

                        $sql1 = "INSERT INTO `info_cater`(`id_number`, `email`, `comp_name`, `landline_num`, `mobile_num`, `address_1`, `address_2`, `city`, `zip_code`, `active`, `token`) VALUES ('$user_id', '$email', '$comp_name', '$landline_num', '$mobile_num', '$address_1', '$address_2', '$city','$zip_code','$active','$token')";

                        $profile_pic = include '../../../system_img/profile_edit.png';

                        $sql2 = "INSERT INTO `cater_profile`(`id_number`,`profile_pic`) VALUES ('$user_id','$profile_pic')";

                        mysqli_query($conn, $sql1);
                        mysqli_query($conn, $sql2);

                        $message = "Almost done! To activate your account, check your email account: $email and click the link to get started.";
                        
                        echo "<SCRIPT type='text/javascript'>
                          alert('$message');
                          window.location.href='index.php';
                          </SCRIPT>";
                        
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
                $sql1 = "UPDATE `info_cater` SET `active` = 1 WHERE `token` = '$token'";
                mysqli_query($conn,$sql);
                mysqli_query($conn,$sql1);
                
        }

?>