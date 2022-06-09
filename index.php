<?php
    require("config.php");
    session_start();
    require('functions.php');
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form 
        
        $userId = mysqli_real_escape_string($db,$_POST['username']);
        $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
        
        if(login($db,$userId, $mypassword) == 1) {
            $_SESSION["userId"]= $userId;
            header("location: pages/student/home.php");
        }else {
            $error = "Your Login Name or Password is invalid";
            // echo '<div align="center">'. $error .'</div>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Management and Monitoring of Final Year Projects</title>
    <link rel="stylesheet" type="text/css" href="main.css"> 
</head>
<body>       
    <div class="login_signup">    
        <form id="login" method="POST" action="">
            <h1>Login</h1>   
            <label><b>UserName     
            </b>    
            </label>    
            <input type="text" name="username" id="username" placeholder="Username">    
            <br><br>    
            <label><b>Password     
            </b>    
            </label>    
            <input type="Password" name="password" id="password" placeholder="Password">    
            <br><br>    
            <div class = "form-group">
                <input type="submit" name="log" id="log" value="Login">
            </div>
            <br>
            <div class="row">
                <div class="column">
                    <a href="register.php">Sign Up</a>
                </div>
                <div class="column">
                    <a href="pages/lecturer/login.php" >Lecturer Login</a>
                </div>
            </div>
        </form>   
    </div>   
</body>



