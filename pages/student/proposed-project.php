<?php
   require("../../config.php");
   require("../../models/lecturer.php");
   require("../../models/project.php");
   session_start(); 
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["propProjId"] = $_POST['proposalId'];
    header("location: proposal-view.php");
    
   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Proposed Project</title>
    <link rel="stylesheet" type="text/css" href="../../main.css"> 
</head>
<body>
    <div class="navbar">
        <a href="home.php">My Project</a>
        <a style="background: #808080"  href="proposed-project.php">Proposed Project</a>
        <a href="appointments.php">Appointments</a>
        <a href="progress.php">Progress</a>
        <a href="assesment.php">Assessment</a>
        <a style="float:right;" href="../../logout.php">Log Out</a>
    </div>

    <div class="main"></div>
    
    
    <h1>Project Proposal</h1>
    <?php
    $result = mysqli_query($db,"SELECT * FROM project_proposal WHERE status = 'open'");
    echo"
        <fieldset class='file'>
            <legend>Proposals</legend><br>
            <table style='width:100%'>
                <tr>
                    <th>Title</th>
                    <th>Lecturer ID</th>
                    <th>Actions</th>
                </tr>";
                while($row = mysqli_fetch_array($result)){
                //$stu_name = Student::getName($row['stu_id'], $db);
                echo"
                    <tr>
                        <td>{$row['proposal_title']}</th>
                        <td>{$row['lect_id']}</th>
                        <td>
                            <form method='post'>
                                <input type='hidden' name='proposalId' value='{$row['project_id']}' />
                                <input type='submit' id='viewProposal' name='viewProposal' value='view' /> 
                            </form>
                        </td>
                    </tr>
                    ";
                }
                echo"
            </table>
        </fieldset>";
    ?>
    </div><br><br>

</body>
</html>