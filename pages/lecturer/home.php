<?php 
 require("../../config.php");
 require("../../models/lecturer.php");
 require("../../models/project.php");
 require("../../models/appointment.php");
 session_start(); 
 $lect_name = Lecturer::getName($_SESSION["userId"], $db);
 $lect_id = $_SESSION["userId"];
 if($_SERVER["REQUEST_METHOD"] == "POST") {
  $student_id = mysqli_real_escape_string($db, $_POST['student_id']);
  $title = mysqli_real_escape_string($db, $_POST['title']);
  Project::submitProject($title, $lect_id, $student_id, 'approved', $db);
 } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Progress</title>
    <link rel="stylesheet" type="text/css" href="../../main.css"> 
</head>
<body>
    <div class="navbar">
        <a style="background: #808080" href="home.php">My Projects</a>
        <a href="proposed-project.php">Proposed Project</a>
        <a href="appointments.php">Appointments</a>
        <a href="assesment.php">Assessment</a>
        <a style="float:right;" href="../../logout.php">Log Out</a>
      </div>       
    <div class="main"> 
    </div>
    </div>

    <div class="meetlog">
        <h1>Assigned Projects</h1>
        <form method="post">
        <fieldset>
        <legend>Assign a Project</legend><br>

            <p><label>Student ID</label><br>
            <input type="text" name="student_id" id="student_id" placeholder="Enter Student ID" required/>
            </p>

            <p><label>Title</label><br>
            <input type="text" name="title" id="title" placeholder="Enter Title" required/>
            </p>

            <p><input type="submit" id="submit" value="Assign" required/></p>

        <table style='width:100%'>
        <tr>
            <th>Student ID</th>
            <th>Project ID</th>
            <th>Title</th>
            <?php    
                $resultAll = mysqli_query($db,"SELECT * FROM project WHERE lect_id = {$_SESSION["userId"]} ");

                while($row = mysqli_fetch_array($resultAll)){
                    echo "
                <tr>
                    <td>{$row['stu_id']}</td>
                    <td>{$row['id']}</td>
                    <td>{$row['title']}</td>
                </tr>";
                    
                }
                ?>
            
        </tr>
        </table>
        </fieldset>
        </form>
    </div><br><br>

</body>
</html>