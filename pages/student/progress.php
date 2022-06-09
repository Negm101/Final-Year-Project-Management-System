<?php
   require("../../config.php");
   require("../../models/plan.php");
   require("../../models/goal.php");
   require("../../models/project.php");
   session_start(); 
   $project_id = Project::getProjectId($_SESSION["userId"], $db);
   if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['addPlan'])) {
    $planVar = mysqli_real_escape_string($db, $_POST['plan']);
    $start_date = mysqli_real_escape_string($db, $_POST['start_date_plan']);
    $end_date = mysqli_real_escape_string($db, $_POST['end_date_plan']);
    echo "$planVar, $start_date, $status, $project_id, $end_date";
    $plan = new Plan($planVar, $start_date, 'In-Progress', $project_id, $end_date);
    $plan->add($db);
   }

   if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['addGoal'])) {
    $goalTitle = mysqli_real_escape_string($db, $_POST['goalTitle']);
    $start_date = mysqli_real_escape_string($db, $_POST['start_date']);
    $goal = new Goal($goalTitle, $start_date, 'in-progress', $project_id);
    $goal->add($db);
   }

   if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['donePlan'])) {
        Plan::done($db, $_POST['plan_id']);
    }

   if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['doneGoal'])) {
        Goal::done($db, $_POST['goal_id']);
   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Progress</title>
    <link rel="stylesheet" type="text/css" href="../../main.css"> 
</head>
<body>
    <div >
        <div class="navbar">
        <a href="home.php">My Project</a>
        <a href="proposed-project.php">Proposed Project</a>
        <a href="appointments.php">Appointments</a>
        <a style="background: #808080" href="progress.php">Progress</a>
        <a href="assesment.php">Assessment</a>
        <a style="float:right;" href="../../logout.php">Log Out</a>
      </div>       
    <div class="main"> 

    
    <div>
    <div class="progress">
        <h1>Progress</h1>
            <form method="post">

                <div>
            <div>
            <form method="post">
                <fieldset>
                        <legend>Add Plan</legend>
                        <p><label>Plan</label><br>
                        <input type="text" name="plan" id="plan" required/>
                        </p>

                        <div class="row">
                            <div class="column">
                            <p><label>Start Date</label>
                        <input type="date" name="start_date_plan" id="start_date_plan"/>
                        </p>
                            </div>

                            <div class="column">
                            <p><label>End Date</label>
                        <input type="date" name="end_date_plan" id="end_date_plan"/>
                        </p>
                            </div>

                        </div><br>

                        <p><input type="submit" name="addPlan" value="Add"  /></p>
                </fieldset>     
            </form> 
            </div>
    </div><br><br>
    <div>
        <fieldset class='file'>
        <legend>Plans Lists</legend><br>
            <table style='width:100%'>
                <tr>
                    <th>Plan</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th><!-- let student click done when fulfill goals-->
                    <th>Actions</th>
                </tr>
                <?php    
                $resultAll = mysqli_query($db,"SELECT * FROM plan WHERE project_id = $project_id ");

                while($row = mysqli_fetch_array($resultAll)){
                    echo "
                <tr>
                    <td>{$row['plans']}</td>
                    <td>{$row['sart_date']}</td>
                    <td>{$row['end_date']}</td>
                    <td>{$row['status']}</td>";
                    if($row['status'] != "Completed"){
                    echo 
                    "<td>
                        <form method='post'>
                            <input type='hidden' name='plan_id' value='{$row['id']}' />
                            <input type='submit' id='donePlan' name='donePlan' value='done' /> 
                        </form>
                    </td>";
                    }else{
                        echo "<td> no actions </td>";
                    }
                echo "</tr>";
                    
                }
                ?>

            </table>
        </fieldset>
    
    </div>
    <br><br>
    
        </div>
    <br><br>
    
    </div>
    </div>
    
    </div>
</body>
</html>
