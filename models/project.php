<?php
class Project{
    public $id;
    public $name;
    public $lec_id;
    public $stu_id;
    public $verf_status;

    function getOne($id, $db){  // gets only the first approved project, requires a student id and db conncetion
       $sql = "SELECT * FROM project WHERE stu_id = $id AND verf_status = 'approved' ";
       $result = mysqli_query($db,$sql);
       $count = mysqli_num_rows($result);
       if($count > 0){  // will not return a result if there is more than one result becuse each student should only have one project
        while ($row = mysqli_fetch_array($result)) {
        $project = new Project();
        $project->id = $row["id"];
        $project->name = $row["title"];
        $project->lec_id = $row["lect_id"];
        $project->stu_id = $row["stu_id"];
        return $project;
    }
       }
    }

    public static function getProjectId($stu_id, $db){
        $sql = "SELECT id FROM project where stu_id = $stu_id AND verf_status = 'approved'";
        $result = mysqli_query($db, $sql);
        $count = mysqli_num_rows($result);

        if($count == 1){ 
            while ($row = mysqli_fetch_array($result)) {
            return $row["id"];
        }
           }
    }

    static function submitProject($name, $lec_id, $stu_id, $verf_status, $db){
        $sql = "INSERT INTO project (title, lect_id, stu_id, verf_status) VALUES('$name', '$lec_id', '$stu_id', '$verf_status')";
        mysqli_query($db,$sql);
        $getID = mysqli_fetch_assoc(mysqli_query($db, "SELECT LAST_INSERT_ID()"));
        $_SESSION["currentProjectId"] = $getID['LAST_INSERT_ID()'];
    }

    static function getProjStuId($db, $project_id){
        $sql = "SELECT lect_id FROM project WHERE id = $project_id";
       $result = mysqli_query($db,$sql);
       $count = mysqli_num_rows($result);
       
       if($count == 1){ 
        while ($row = mysqli_fetch_array($result)) {
        return $row["stu_id"];
    }
       }
    }

}
?>