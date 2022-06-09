
<?php
   include("config.php");
   include("functions.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $stuId = mysqli_real_escape_string($db,$_POST['stuId']);
      $name = mysqli_real_escape_string($db,$_POST['name']);
      $faculty = mysqli_real_escape_string($db, $_POST['faculty']);
      $password = mysqli_real_escape_string($db,$_POST['password']); 
      registerStudent($db,$stuId, $password, $name, $faculty); 
      header("location: index.php");
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
    <form id="sign_up" method="post" action="">   
            <h1>Create Account</h1> 
            <label><b>Studetn ID     
            </b>    
            </label>    
            <input type="text" name="stuId" id="stuId" required/>    
            <br><br>
            <label><b>Name     
            </b>    
            </label>    
            <input type="text" name="name" id="name" required/>    
            <br><br>
            <label><b>Faculty</b>    
            </label>    
            <input type="text" name="faculty" id="faculty" required/>    
            <br><br>   
            <label><b>Password
            </b>    
            </label>    
            <input type="Password" name="password" id="password"  required/>
            <br><br>     
            <input type="submit" name="Register" id="Register" value="Register">
            <p class="">
                <a class="" href="index.php" id="">Log In</a>
            </p>
        </form>
    </div>   
</body>



