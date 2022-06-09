<?php
   require("../../config.php");
   require("../../models/lecturer.php");
   require("../../models/assesment.php");
   session_start(); 
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_id = mysqli_real_escape_string($db, $_POST['project_id']);
    $fyp1 = mysqli_real_escape_string($db, $_POST['fyp1']);
    $fyp2 = mysqli_real_escape_string($db, $_POST['fyp2']);
    $assesment = new Assessment($fyp1, $fyp2, $project_id);
    $assesment->submitMark($db);
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Assessment</title>
    <link rel="stylesheet" type="text/css" href="../../main.css"> 
</head>
<body>
<div class="navbar">
        <a href="home.php">My Projects</a>
        <a href="proposed-project.php">Proposed Project</a>
        <a href="appointments.php">Appointments</a>
        <a style="background: #808080" href="assesment.php">Assessment</a>
        <a style="float:right;" href="../../logout.php">Log Out</a>
      </div>       
    <div class="main"> 
    </div>
    </div>

    <div class='meetlog'>
        <h1>Assessment</h1>
        <form method="post">
        <fieldset>
        <legend>FYP Results</legend><br>
            <table style='width:100%'>
            <p><label>Project ID</label><br>
                <input type="text" name="project_id" id="project_id"required/>
            </p>

            <p><label>FYP 1 Marks</label><br>
                <input type="text" name="fyp1" id="fyp1" required/>
            </p>

            <p><label>FYP 2 Marks</label><br>
                <input type="text" name="fyp2" id="fyp2"required/>
            </p>

            <p><input type="submit" id="submit" value="Submit Marks" /></p>
            </table>
        </fieldset>
    
    </div>
    <br><br>
    <div class="Assessment">
            <form method="get" >
    <div>
        <fieldset class='file'>
        <legend>All FYP Results</legend><br>
            <table style='width:100%'>
                <tr>
                    <th>Project ID</th>
                    <th>FYP 1</th>
                    <th>FYP 2</th>
                    <th>Grade</th>
                </tr>
                <?php    
                $resultAll = mysqli_query($db,"SELECT * FROM assesment WHERE lect_id = {$_SESSION["userId"]} ");

                while($row = mysqli_fetch_array($resultAll)){
                    echo "
                <tr>
                    <td>{$row['project_id']}</td>
                    <td>{$row['fyp1']}%</td>
                    <td>{$row['fyp2']}%</td>
                    <td>{$row['grade']}%</td>
                </tr>";
                    
                }
                ?>        
                
            </table>
        </fieldset>
    
    </div>
</body>
</html>