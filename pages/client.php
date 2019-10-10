<?php
include '../config/database.php';
include '../controllers/authController_client.php';
include '../controllers/action.php';

    /*IF SITE WILL READ THE TOKEN IF IT IS NEWLY VERIFIED*/
    if (isset($_GET['token'])) {
        $token = $_GET['token'];
        verifyUser($token);
        echo '<script langauge="javascript">';
        echo 'alert("Your account is now verified")';
        echo '</script>';
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>test</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="../assets/css/untitled-1.css">
    <link rel="stylesheet" href="../assets/css/untitled.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include 'client-header.php'; ?>

     <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            switch ($page){
                case 'client-home':
                include 'client-home.php';
                break;

                case 'client-profile':
                include 'client-profile.php';
                break;

                case 'client-transactions':
                include 'client-transactions.php';
                break;

                case 'client-calendar':
                include 'client-calendar.php';
                break;

                default:
                include 'client-home.php';
                }
            }

        else {
            include 'client-home.php';
        }
    ?>
    
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>

</html>