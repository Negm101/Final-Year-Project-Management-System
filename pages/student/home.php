
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Project</title>
    <link rel="stylesheet" type="text/css" href="../../main.css"> 
</head>
<body>
    <div class="navbar">
        <a style="background: #808080" href="home.php">My Project</a>
        <a href="proposed-project.php">Proposed Project</a>
        <a href="appointments.php">Appointments</a>
        <a href="progress.php">Progress</a>
        <a href="assesment.php">Assessment</a>
        <a style="float:right;" href="../../logout.php">Log Out</a>
      </div>       
    <div class="main">
      
    </div>
    <?php
    require("../../config.php");
    require("../../models/project.php");
    require("../../models/lecturer.php");
    session_start(); // sesssion will store the current user id
    $project = new Project();
    $project = $project->getOne($_SESSION["userId"], $db); // get project for the logged in user
    $lect_name = Lecturer::getName($project->lec_id, $db);
    echo "
    <h1>My Project</h1>
    <fieldset class='file'>
    
      <legend>Student Project Status</legend><br>
      <table style='width:100%'>
      <tr>
        <th>Project ID</th>
        <td>{$project->id}</td>
      </tr>
      <tr>
        <th>Title</th>
        <td>{$project->name}</td>
      </tr>
      <tr>
        <th>Lecturer</th>
        <td>{$lect_name}</td>
      </tr>
    </table>";
    ?>
    </div>
</body>
</html>