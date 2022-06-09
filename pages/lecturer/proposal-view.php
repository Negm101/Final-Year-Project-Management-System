<?php
   require("../../config.php");
   require("../../models/lecturer.php");
   require("../../models/proposal.php");
   session_start(); 

   $propo = new Proposal();
   $propo = $propo->getOne($_SESSION["propProjId"], $db);
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    header("location: proposed-project.php");
   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Appointments</title>
    <link rel="stylesheet" type="text/css" href="../../main.css">
</head>

<body>

    <div class="main"></div>   

    <div class="Proposal">
        <h1>Proposal</h1>
            <form method="post">
                <fieldset margin="auto">
                        <legend><?php echo $_SESSION["propProjId"] ?></legend>
                        <p><label>Description</label><br>
                        <textarea rows="20" cols="80" type="text" name="description" id="description" disabled> <?php echo"$propo->description"?> </textarea>
                        </p>

                        <p><label>Objective</label><br>
                        <textarea rows="20" cols="80" type="text" name="objective" id="objective" disabled> <?php echo"$propo->objective"?> </textarea>
                        </p>

                        <p><label>Scope</label><br>
                        <textarea rows="20" cols="80" type="text" name="scope" id="scope" disabled> <?php echo"$propo->scope"?> </textarea>
                        </p>

                        <p><input type="submit" id="submit" value="Go Back" /></p>
                </fieldset>     
            </form> 
    </div><br><br>
    
</html>