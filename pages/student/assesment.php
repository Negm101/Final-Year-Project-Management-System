<?php
   require("../../config.php");
   require("../../models/project.php");
   session_start(); 
   $project_id = Project::getProjectId($_SESSION["userId"], $db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Assessment</title>
    <link rel="stylesheet" type="text/css" href="../../main.css"> 
</head>
<body>
    <div class="navbar">
        <a href="home.php">My Project</a>
        <a href="proposed-project.php">Proposed Project</a>
        <a href="appointments.php">Appointments</a>
        <a href="progress.php">Progress</a>
        <a style="background: #808080" href="assesment.php">Assessment</a>
        <a style="float:right;" href="../../logout.php">Log Out</a>
      </div>       
    <div class="main"> 
    </div>
    </div>

    <div class="Assessment">
        <h1>Assessment</h1>
            <form method="get" action="http://www.randyconnolly.com/tests/process.php">
    <div>
        <fieldset class='file'>
        <legend>FYP Results</legend><br>
            <table style='width:100%'>
                <tr>
                    <th>FYP 1</th>
                    <th>FYP 2</th>
                    <th>Grade</th>
                </tr>
                <?php    
                $resultAll = mysqli_query($db,"SELECT * FROM assesment WHERE project_id = $project_id ");

                while($row = mysqli_fetch_array($resultAll)){
                    echo "
                <tr>
                    <td>{$row['fyp1']}</td>
                    <td>{$row['fyp2']}</td>
                    <td>{$row['grade']}</td>
                </tr>";
                    
                }
                ?>        
                
            </table>
        </fieldset>
    
    </div>
    <br><br>
</body>
</html>