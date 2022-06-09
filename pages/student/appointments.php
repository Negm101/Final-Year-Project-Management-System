<?php
   require("../../config.php");
   require("../../models/lecturer.php");
   require("../../models/project.php");
   require("../../models/appointment.php");
   session_start(); 
   $project_id = Project::getProjectId($_SESSION["userId"], $db);
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["lect_id_log"]= mysqli_real_escape_string($db, $_POST['lect_id']); 
    header("location: meeting-log-info.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Appointments</title>
    <link rel="stylesheet" type="text/css" href="../../main.css">
</head>

<body>
    <div class="navbar">
        <a href="home.php">My Project</a>
        <a href="proposed-project.php">Proposed Project</a>
        <a style="background: #808080" href="appointments.php">Appointments</a>
        <a href="progress.php">Progress</a>
        <a href="assesment.php">Assessment</a>
        <a style="float:right;" href="../../logout.php">Log Out</a>
    </div> 

    <div class="main"></div>
    
    <div class="meetlog">
        <h1>Meeting Log</h1>
            <form method="post">
                <fieldset>
                    <legend>Upload Meeting Log File</legend><br>

                    <label>Lecturer ID</label><br>
                    <input type="text" name="lect_id" required/><br><br>

                    <p><input type="submit" id="submit" value="Next"/></p>
                </fieldset>
            </form> 
    </div><br><br>  
    <div>
    <?php    
    $resultAll = mysqli_query($db,"SELECT * FROM appointment WHERE project_id = $project_id ");
    echo"
        <fieldset class='file'>
            <legend>Meeting Schedule</legend><br>
            <table style='width:100%'>
                <tr>
                    <th>Title</th>
                    <th>Time</th>
                    <th>Date</th>
                    <th>Link</th>
                </tr>";
                while($row = mysqli_fetch_array($resultAll)){
                    echo "<tr>
                    <td>{$row['title']}</th>
                    <td>{$row['time']}</th>
                    <td>{$row['date']}</th>
                    <td>{$row['meeting_link']}</th>
                </tr>";
                }
            "</table>
        </fieldset>";
    ?>
    </div> 
   
</body>
</html>