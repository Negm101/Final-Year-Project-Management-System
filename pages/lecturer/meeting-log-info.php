<?php
   require("../../config.php");
   require("../../models/meeting-log.php");
   session_start(); 
   $lect_id = $_SESSION["userId"];
   $meeetingLog = MeetingLog::getOne($db,$_SESSION["viewLogId"]);  
   if($_SERVER["REQUEST_METHOD"] == "POST") {
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
                <fieldset margin="auto">
                        <legend><?php echo $_SESSION["viewLogId"] ?></legend>
                        <p><label>Work Done</label><br>
                        <textarea rows="20" cols="80" type="text" name="work_done" id="work_done" disabled> <?php echo $meeetingLog->work_done ?> </textarea>
                        </p>

                        <p><label>Work to be Done</label><br>
                        <textarea rows="20" cols="80" type="text" name="work_to_be_done" id="work_to_be_done" disabled><?php echo $meeetingLog->work_to_be_done ?> </textarea>
                        </p>

                        <p><label>Problems Encounterd</label><br>
                        <textarea rows="20" cols="80" type="text" name="problems_encounterd" id="problems_encounterd" disabled> <?php echo $meeetingLog->problems_encounterd ?></textarea>
                        </p>

                        <p><label>Comments</label><br>
                        <textarea rows="20" cols="80" type="text" name="comments" id="comments" disabled><?php echo $meeetingLog->comments ?> </textarea>
                        </p>

                        <p><label>Date</label><br>
                        <input type="date" name="date" id="date" value="<?php echo $meeetingLog->date ?>" disabled/>
                        </p>

                        <form method="post">
                        <p><input type="submit" id="submit" value="Go Back"/></p>
                        </form>
                </fieldset>     
    </div><br><br>
    
</html>