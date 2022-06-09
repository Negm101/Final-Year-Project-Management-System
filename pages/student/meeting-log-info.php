<?php
   require("../../config.php");
   require("../../models/meeting-log.php");
   require("../../models/project.php");
   session_start(); 
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    $lect_id = $_SESSION["lect_id_log"];
    $work_done = mysqli_real_escape_string($db, $_POST['work_done']);
    $work_to_be_done = mysqli_real_escape_string($db, $_POST['work_to_be_done']);
    $problems_encounterd = mysqli_real_escape_string($db, $_POST['problems_encounterd']);
    $comments = mysqli_real_escape_string($db, $_POST['comments']);
    $date = mysqli_real_escape_string($db, $_POST['date']);
    $meeting_log = new MeetingLog($work_done, $work_to_be_done, $problems_encounterd, $comments, $date, $lect_id, $_SESSION["userId"]);
    $meeting_log->add($db);
    header("location: appointments.php");
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
                        <legend><?php echo $_SESSION["lect_id_log"] ?></legend>
                        <p><label>Work Done</label><br>
                        <textarea rows="20" cols="80" type="text" name="work_done" id="work_done" required> </textarea>
                        </p>

                        <p><label>Work to be Done</label><br>
                        <textarea rows="20" cols="80" type="text" name="work_to_be_done" id="work_to_be_done" required> </textarea>
                        </p>

                        <p><label>Problems Encounterd</label><br>
                        <textarea rows="20" cols="80" type="text" name="problems_encounterd" id="problems_encounterd" required> </textarea>
                        </p>

                        <p><label>Comments</label><br>
                        <textarea rows="20" cols="80" type="text" name="comments" id="comments" required> </textarea>
                        </p>

                        <p><label>Date</label><br>
                        <input type="date" name="date" id="date" required/>
                        </p>


                        <p><input type="submit" id="submit" value="Submit Proposal" /></p>
                </fieldset>     
            </form> 
    </div><br><br>
    
</html>