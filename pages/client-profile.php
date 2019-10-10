<!--WORKING PROGRESS-->
<?php
error_reporting(0);
ini_set('display_errors', 0);
include '../controllers/authController_client.php';
include '../controllers/action.php';

$getID = $_GET['view'];
$selectID = "SELECT * FROM `info_cater` WHERE id_number = $getID";
$qry = mysqli_query($conn,$selectID);
$assoc = mysqli_fetch_assoc($qry);
	$comp_name = $assoc['comp_name'];
	$comp_site = $assoc['comp_site'];
    $mobile_num = $assoc['mobile_num'];

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
</head>

<body>
    <?php include 'client-header.php'; ?>
    <div class="container">
    <?php echo $getID; ?><?php echo $comp_name;?><?php echo $comp_site;?>
    <br>
    <button type="button" class="btn" style="background-color: #F5F5F5" data-toggle="modal" data-target="#interest">Interested</button>
  	<button type="button" class="btn btn-primary">Default</button>

    <div class="modal fade" role="dialog" id="interest" tabindex="-1">
        <form method="POST" role="form">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-body">
                <p>This will send an sms notification to the caterer that you are intersted and as soon they receive, they can view your profile</p>
                <input type="hidden" name="number" value="<?php echo $mobile_num;?>">
                <input type="hidden" name="msg" value="Hi there! A client is interest to have you as their cater! Just login to feeds.com to view who's interested!">
            </div>
            <div class="modal-footer">
                <input type="submit" name="send" class="btn btn-primary" value="go">
                <a href=""><button class="btn btn-light" type="button" data-dismiss="modal" >Close</button></a>
            </div>
            </div>
        </div>
    </form>
    </div>
</div>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
