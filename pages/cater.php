<?php
include '../config/database.php';
include '../controllers/authController_cater.php';
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
    <link rel="stylesheet" href="../css/main.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="../assets/css/style_c.css">
    <link rel="stylesheet" href="../assets/css/style_d.css">
    <link href="../css/style2.css" rel="stylesheet">
</head>

<body>
   <?php include 'cater-header.php'; ?>

    <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            switch ($page){
                case 'cater-home':
                include 'cater-home.php';
                break;

                case 'cater-profile':
                include 'cater-profile.php';
                break;

                case 'cater-transactions':
                include 'cater-transactions.php';
                break;

                case 'cater-calendar':
                include 'cater-calendar.php';
                break;

                default:
                include 'cater-home.php';
                }
            }

        else {
            include 'cater-home.php';
        }
    ?>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>