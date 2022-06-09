<?php
   require("../../config.php");
   require("../../models/lecturer.php");
   require("../../models/student.php");
   require("../../models/project.php");
   require("../../models/appointment.php");
   session_start(); 
   $lect_id = $_SESSION["userId"];
   if($_SERVER["REQUEST_METHOD"] == "POST" ) {
    if(isset($_POST['viewLog'])) {
        $_SESSION["viewLogId"]= $_POST['meeting_id'];
        header("location: meeting-log-info.php");
    }
    else{
        
        $student_id = mysqli_real_escape_string($db, $_POST['student_id']);
        $project_id = mysqli_real_escape_string($db, $_POST['project_id']);
        $title = mysqli_real_escape_string($db, $_POST['title']);
        $date = mysqli_real_escape_string($db, $_POST['date']);
        $time = mysqli_real_escape_string($db, $_POST['time']);
        $meeting_link = mysqli_real_escape_string($db, $_POST['meeting_link']);
        $appointment = new Appointment($title, $date, '', '', $project_id, $lect_id, $time, $meeting_link);
        $appointment->addMeeting($db);
    }

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
        <a href="home.php">My Projects</a>
        <a href="proposed-project.php">Proposed Project</a>
        <a style="background: #808080" href="appointments.php">Appointments</a>
        <a href="assesment.php">Assessment</a>
        <a style="float:right;" href="../../logout.php">Log Out</a>
    </div> 

    <div class="main"></div>
    
    <div class="meetlog">
        <h1>View Meeting Log</h1>
        <fieldset>
            <legend>Students Meeting Log File</legend><br>
            <table style='width:100%'>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Meeting Date</th>
                <th>Actions</th>
                
            </tr>
            <?php    
                $resultAll = mysqli_query($db,"SELECT * FROM meeting_log WHERE lect_id = {$_SESSION["userId"]} ");

                while($row = mysqli_fetch_array($resultAll)){
                    $stuName = Student::getName($db, $row['student_id']);
                
                    echo "
                <tr>
                    <td>{$row['student_id']}</td>
                    <td>$stuName</td>
                    <td>{$row['date']}</td>
                    <td>
                        <form method='post'>
                            <input type='hidden' name='meeting_id' value='{$row['id']}' />
                            <input type='submit' id='viewLog' name='viewLog' value='view' /> 
                        </form>
                    </td>
                </tr>";
                    
                }
                ?>
            </table>
        </fieldset>
    </div><br><br>  

    <div class="appointments">
        <h1>Appointments</h1>
            <form method="post">
                <fieldset>
                        <legend>Booking Slot</legend>
                        
                        <p><label>Student ID</label><br>
                        <input type="text" name="student_id" id="student_id"  />
                        </p>

                        <p><label>Project ID</label><br>
                        <input type="text" name="project_id" id="project_id"  />
                        </p>

                        <p><label>Title</label><br>
                        <input type="text" name="title" id="title" />
                        </p>

                        <p><label>Time</label><br>
                        <input type="time" name="time", id="time" >
                        </p>

                        <p><label>Date</label><br>
                        <input type="date" name="date" id="date" />
                        </p>

                        <p><label>Meeting Link</Title></label><br>
                        <input type="text" name="meeting_link" id="meeting_link" placeholder="Enter link" />
                        </p>
                        
                        <p><input type="submit" id="submit" value="Add Meeting" /></p>
                </fieldset>     
            </form> 
    </div><br><br>


    <div>
    <?php    
    $resultAll = mysqli_query($db,"SELECT * FROM appointment WHERE lect_id = $lect_id ");
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