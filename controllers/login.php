<?php
require_once 'config/database.php';
 if(isset($_POST["login"]))  
 {  
      if(empty($_POST["email"]) || empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {  
           $email = mysqli_real_escape_string($conn, $_POST["email"]);  
           $password = mysqli_real_escape_string($conn, $_POST["password"]);  
           $query = "SELECT * FROM users WHERE email = '$email'";  
           $result = mysqli_query($conn, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_array($result))  
                {  
                     if(password_verify($password, $row["password"]))  
                     {  
                          //return true;  
                          $_SESSION["email"] = $email;  
                          header("location:pages/cater.php");
                     }  
                     else  
                     {  
                          //return false;  
                          echo '<script>alert("Wrong User Details")</script>';  
                     }  
                }  
           }  
           else  
           {  
                echo '<script>alert("Wrong User Details")</script>';  
           }  
      }  
 }  

?>