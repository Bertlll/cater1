<!-- TO SIGN UP CLIENT AND SEND VERIFICATION TOKEN SMTP-->
<?php
require_once 'control/authController_client.php'; 
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>test</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles1.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body>
    <!-- CLIENT SIGNUP FORM -->
    <form method="POST" action="client-signup.php">
    <div id="cl-paragraph">
        <p id="cl-right">Looks like</p>
        <p id="cl-right-1">you need</p>
        <p id="cl-right-2">catering</p><input class="btn btn-primary" name="add-client" onclick="activation()" id="cl-confirm" type="submit" value="Sign Up">
        <p id="cl-right-3">or</p><button class="btn btn-primary" id="cl-cater" type="button">Sign up as a caterer instead</button></div>
        
    <div id="top-client">
        <div class="container">
            <h1 class="text-center" id="cl-header" style="font-size: 35px;">Signing up as a Client</h1>
            <div class="table-responsive" id="cl-info1">
                <table class="table">
                    <tbody class="text-white" id="tb-nocolor">
                        <tr id="no-color">
                            <td id="italic" style="height: -4px;margin: 0px;padding: 0px 0px 0px 15px;">First Name</td>
                        </tr>
                        <tr>
                            <td style="height: 28px;padding: -7px;"><input type="text" name="fname" placeholder="Enter your first name"></td>
                        </tr>
                        <tr>
                            <td id="italic" style="height: -4px;margin: 0px;padding: 0px 0px 0px 15px;">Last Name</td>
                            <td id="italic" style="height: -4px;margin: 0px;padding: 0px 0px 0px 15px;">Mobile Number</td>
                        </tr>
                        <tr>
                            <td style="height: 28px;padding: -7px;"><input type="text" name="lname" placeholder="Enter your last name"></td>
                            <td style="height: 28px;padding: -7px;"><input type="text" name="mobile_num" placeholder="Enter your mobile number"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="mid-client">
        <div class="container">
            <div class="table-responsive" id="cl-info2">
                <table class="table">
                    <tbody class="text-white" id="tb-nocolor">
                        <tr>
                            <td id="italic2" style="height: -4px;margin: 0px;padding: 0px 0px 0px 15px;">Email-Address</td>
                        </tr>
                        <tr>
                            <td id="bord-orange" style="height: 28px;padding: -7px;"><input type="text" name="email" placeholder="Enter your email address"></td>
                        </tr>
                        <tr>
                            <td id="italic2" style="height: -4px;margin: 0px;padding: 0px 0px 0px 15px;">Password</td>
                            <td id="italic2" style="height: -4px;margin: 0px;padding: 0px 0px 0px 15px;">Confirm Password</td>
                        </tr>
                        <tr>
                            <td id="bord-orange" style="height: 28px;padding: -7px;"><input title="Password must contain at least 8 character, including UPPER/lowercase and numbers" type="text" name="password" placeholder="Password at least 8 character, including UPPER/lowercase and numbers" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
                                if(this.checkValidity()) form.pwd2.pattern = RegExp.escape(this.value);"></td>
                            <td id="bord-orange" style="height: 28px;padding: -7px;"><input title="Passwords doesn't match." type="text" name="password2" placeholder="Re-type your password"  required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
                            "></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="btm-client">
        <div class="container">
            <h1 style="font-size: 20px;">Address (optional)</h1>
            <div class="table-responsive" id="cl-info3">
                <table class="table">
                    <tbody class="text-white" id="tb-nocolor">
                        <tr>
                            <td id="italic1" style="height: -4px;margin: 0px;padding: 0px 0px 0px 15px;">Address-line 1</td>
                            <td id="italic1" style="height: -4px;margin: 0px;padding: 0px 0px 0px 15px;">Address-line 2</td>
                        </tr>
                        <tr>
                            <td id="bord-dirt" style="height: 28px;padding: -7px;"><input type="text" name="address_1"></td>
                            <td id="bord-dirt" style="height: 28px;padding: -7px;"><input type="text" name="address_2"></td>
                        </tr>
                        <tr>
                            <td id="italic1" style="height: -4px;margin: 0px;padding: 0px 0px 0px 15px;">Postal/Zip Code</td>
                            <td id="italic1" style="height: -4px;margin: 0px;padding: 0px 0px 0px 15px;">City</td>
                        </tr>
                        <tr>
                            <td id="bord-dirt" style="height: 28px;padding: -7px;"><input type="text" name="zip_code"></td>
                            <td id="bord-dirt" style="height: 28px;padding: -7px;">
                                <?php
                                    include("config/database.php");
                                    $city_list = mysqli_query ($conn,"SELECT * FROM `city_list`");
                                ?>
                                <select id="bord-orange" name="city">
                                    <optgroup label="Select City">
                                        <?php
                                        while ($rows = mysqli_fetch_assoc($city_list)) {
                                            $cty = $rows['city_list'];
                                            echo "<option value='$cty'>".$rows['city_list']."</option>";
                                        }
                                        ?>
                                    </optgroup>
                                </select></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </form>
    <h1 id="feeds-btm">feeds.</h1>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>