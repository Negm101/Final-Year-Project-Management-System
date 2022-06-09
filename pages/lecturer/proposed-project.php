<?php
   require("../../config.php");
   require("../../models/lecturer.php");
   require("../../models/project.php");
   require("../../models/proposal.php");
   require("../../models/student.php");
   session_start(); 
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['viewProposal'])){
        $_SESSION["propProjId"] = $_POST['proposalId'];
        header("location: proposal-view.php");
    }
    if(isset($_POST['assignedButton'])){
        Proposal::updateToTaken($db, $_POST['proposalId']);
        header("location: proposed-project.php");
    }
    if(isset($_POST['deleteButton'])){
        Proposal::delete($db, $_POST['proposalId']);
        header("location: proposed-project.php");
    }
    else{
        $lect_id = $_SESSION["userId"];
        $project_title = mysqli_real_escape_string($db, $_POST['project_title']);
        $verf_status = "pending";
        $_SESSION["propProjTitle"]= $project_title;
        header("location: proposal.php");
    }
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
        <a href="home.php">My Projects</a>
        <a style="background: #808080"  href="proposed-project.php">Proposed Project</a>
        <a href="appointments.php">Appointments</a>
        <a href="assesment.php">Assesment</a>
        <a style="float:right;" href="../../index.php">Log Out</a>
    </div>

    <div class="main"></div>
    
    <div class="proposal">
        <h1>Project Proposal</h1>
            <form method="post">
                <fieldset>
                    <legend>Submit Proposal</legend><br>

                    <p><label>Proposal Title</label><br>
                    <input type="text" name="project_title" id ="project_title"  required/>
                    </p><br>

                    <p><input type="submit" id="submit" value="Next"/></p>
                </fieldset>
            </form> 
    </div><br><br>

    <?php
    $result = mysqli_query($db,"SELECT * FROM project_proposal WHERE lect_id = {$_SESSION['userId']}");
    echo"
        <fieldset class='file'>
            <legend>Proposals</legend><br>
            <table style='width:100%'>
                <tr>
                    <th>Proposal ID</th>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>";
                while($row = mysqli_fetch_array($result)){
                echo"
                    <tr>
                        <td>{$row['project_id']}</th>
                        <td>{$row['proposal_title']}</th>
                        ";
                        if($row["status"] == "open"){
                            echo"<td>
                            <form method='post'>
                                <input type='hidden' name='proposalId' value='{$row['project_id']}' />
                                <input type='submit' id='viewProposal' name='viewProposal' value='view' /> 
                                <input type='submit' id='assignedButton' name='assignedButton' value='assign' /> 
                                <input type='submit' id='deleteButton' name='deleteButton' value='delete' /> 
                            </form>
                        </td>";
                        }
                        else{
                            echo"<td>
                            <form method='post'>
                                <input type='hidden' name='proposalId' value='{$row['project_id']}' />
                                <input type='submit' id='viewProposal' name='viewProposal' value='view' /> 
                                <input type='submit' id='deleteButton' name='deleteButton' value='delete' /> 
                            </form>
                        </td>";
                        }
                        echo"
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