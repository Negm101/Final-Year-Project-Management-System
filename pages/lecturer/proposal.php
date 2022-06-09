<?php
   require("../../config.php");
   require("../../models/lecturer.php");
   require("../../models/project.php");
   require("../../models/proposal.php");
   session_start(); 
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_title = $_SESSION["propProjTitle"];
    $description = mysqli_real_escape_string($db, $_POST['description']);
    $objective = mysqli_real_escape_string($db, $_POST['objective']);
    $scope = mysqli_real_escape_string($db, $_POST['scope']);
    Proposal::submitProposal($_SESSION["userId"], $project_title, $description, $objective, $scope,$db);
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
                        <legend></legend>
                        <p><label>Description</label><br>
                        <textarea  rows="20" cols="80" type="text" name="description" id="description" required> </textarea>
                        </p>

                        <p><label>Objective</label><br>
                        <textarea  rows="20" cols="80" type="text" name="objective" id="objective" required> </textarea>
                        </p>

                        <p><label>Scope</label><br>
                        <textarea  rows="20" cols="80" type="text" name="scope" id="scope" required> </textarea>
                        </p>

                        <p><input type="submit" id="submit" value="Submit Proposal" /></p>
                </fieldset>     
            </form> 
    </div><br><br>
    
</html>