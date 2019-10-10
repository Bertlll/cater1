<!-- TO SIGN UP CATER AND SEND VERIFICATION TOKEN SMTP-->
<?php require_once 'control/authController_cater.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>test</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles1.css">
    <link rel="stylesheet" href="../assets/css/untitled.css">
    <link rel="stylesheet" href="../assets/css/styles_c.css">
    <link rel="stylesheet" href="../assets/css/styles_d.css">
</head>

<body>
    <form method="POST">
    <div id="cl-paragraph">
        <p id="cl-right">Take your</p>
        <p id="cl-right-1">food business</p>
        <p id="cl-right-2">to the</p>
        <p id="cl-right-2">next level</p><input class="btn btn-primary" name="add-cater" id="cl-confirm" type="submit" value="Sign Up">
        <p id="cl-right-3">or</p><button class="btn btn-primary" id="cl-cater" type="button">Sign up as a client instead</button>
    </div>

    <div id="top-client">
        <div class="container">
            <h1 class="text-center" id="cl-header" style="font-size: 35px;">Signing up as a Caterer</h1>
            <div class="table-responsive" id="cl-info1">
                <table class="table">
                    <tbody class="text-white" id="tb-nocolor">
                        <tr id="no-color">
                            <td id="italic" style="height: -4px;margin: 0px;padding: 0px 0px 0px 15px;">Company Name</td>
                            <td id="italic" style="height: -4px;margin: 0px;padding: 0px 0px 0px 15px;">Landline Number</td>
                        </tr>
                        <tr>
                            <td style="height: 28px;padding: -7px;"><input type="text" name="comp_name" placeholder="enter company name"></td>
                            <td style="height: 28px;padding: -7px;"><input type="text" name="landline_num" placeholder="landline number"></td>
                        </tr>
                        <tr>
                            
                            <td id="italic" style="height: -4px;margin: 0px;padding: 0px 0px 0px 15px;">Mobile Number</td>
                        </tr>
                        <tr>
                            
                            <td style="height: 28px;padding: -7px;"><input type="text" name="mobile_num" placeholder="mobile number" value="+63"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="mid-cater">
        <div class="container">
            <div class="table-responsive" id="cl-info2">
                <table class="table">
                    <tbody class="text-white" id="tb-nocolor">
                        <tr>
                            <td id="italic1" style="height: -4px;margin: 0px;padding: 0px 0px 0px 15px;">Email-Address</td>
                        </tr>
                        <tr>
                            <td id="bord-dirt" style="height: 28px;padding: -7px;"><input type="text" title="Enter your email address" id="email" name="email" placeholder="email address"></td>
                        </tr>
                        <tr>
                            <td id="italic1" style="height: -4px;margin: 0px;padding: 0px 0px 0px 15px;">Password</td>
                            <td id="italic1" style="height: -4px;margin: 0px;padding: 0px 0px 0px 15px;">Confirm Password</td>
                        </tr>
                        <tr>
                            <td id="bord-dirt" style="height: 28px;padding: -7px;"><input title="Password must contain at least 8 character, including UPPER/lowercase and numbers" type="password" name="password" placeholder="Enter a password at least 8 character, including UPPER/lowercase and numbers" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
                                if(this.checkValidity()) form.pwd2.pattern = RegExp.escape(this.value);">
                            </td>
                            <td id="bord-dirt" style="height: 28px;padding: -7px;"><input title="Passwords doesn't match." type="password" name="password2" placeholder="re-type password"  required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
                            "></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="btm-cater">
        <div class="container">
            <h1 style="font-size: 20px;">Address (optional)</h1>
            <div class="table-responsive" id="cl-info3">
                <table class="table">
                    <tbody class="text-white" id="tb-nocolor">
                        <tr>
                            <td id="italic3" style="height: -4px;margin: 0px;padding: 0px 0px 0px 15px;">Address-line 1</td>
                            <td id="italic3" style="height: -4px;margin: 0px;padding: 0px 0px 0px 15px;">Address-line 2</td>
                        </tr>
                        <tr>
                            <td id="bord-orange" style="height: 28px;padding: -7px;"><input type="text" name="address_1" id="bord-orange"></td>
                            <td id="bord-orange" style="height: 28px;padding: -7px;"><input type="text" name="address_2"></td>
                        </tr>
                        <tr>
                            <td id="italic3" style="height: -4px;margin: 0px;padding: 0px 0px 0px 15px;">Postal/Zip Code</td>
                            <td id="italic3" style="height: -4px;margin: 0px;padding: 0px 0px 0px 15px;">City</td>
                        </tr>
                        <tr>
                            <td id="bord-orange" style="height: 28px;padding: -7px;"><input type="text" name="zip_code"></td>
                            <td id="bord-orange" style="height: 28px;padding: -7px;">
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
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</body>

</html>