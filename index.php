<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>test</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles_c.css">
    <link rel="stylesheet" href="assets/css/styles_d.css">
</head>

<body>
    <!-- LOG IN -->
    <div id="login">
        <div class="container-fill">
            <?php
                if (isset($_GET['page'])) {
                $page = $_GET['page'];
                /* $PAGE = FOR PAGE CONTROL */
                switch ($page){
                    case 'client-signup':
                    include 'pages/client-signup.php';
                    break;

                    case 'cater-signup':
                    include 'pages/cater-signup.php';
                    break;

                default:
                    include 'home.php';
                }
            }

            else {
                include 'home.php';
            }
            ?>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>