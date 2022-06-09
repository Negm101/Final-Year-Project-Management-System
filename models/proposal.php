<?php
class Proposal{
    public $id;
    public $description;
    public $objective;
    public $scope;
    public $verf_status;

    function getOne($id, $db){  // gets only the first approved project, requires a id and db conncetion
        $sql = "SELECT * FROM project_proposal where project_id = $id";
        $result = mysqli_query($db,$sql);
        $count = mysqli_num_rows($result);
        if($count == 1){  // will not return a result if there is more than one result becuse each student should only have one project
         while ($row = mysqli_fetch_array($result)) {
         $proposal = new Proposal();
         $proposal->id = $row["project_id"];
         $proposal->description = $row["description"];
         $proposal->objective = $row["objective"];
         $proposal->scope = $row["scope"];
         $proposal->verf_status = $row["status"];
         return $proposal;
     }
        }
     }

     

    static function submitProposal( $lect_id,$title,$description, $objective, $scope, $db){
        $sql = "INSERT INTO project_proposal (proposal_title,description, objective, scope, status, lect_id) VALUES('$title', '$description', '$objective', '$scope', 'open', $lect_id)";
        mysqli_query($db,$sql);
    }

    static function updateToTaken($db, $proposal_id){
        $sql = "UPDATE project_proposal SET status='taken' WHERE project_id=$proposal_id;";
        mysqli_query($db, $sql);
    }

    static function delete($db, $proposal_id){
        $sql = "DELETE FROM project_proposal WHERE project_id=$proposal_id;";
        mysqli_query($db, $sql);
    }
}
?>