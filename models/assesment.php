<?php 
class Assessment{
    public $fyp1_grade;
    public $fyp2_grade;
    public $project_id;

    function __construct($fyp1_grade, $fyp2_grade, $project_id){
        $this->fyp1_grade = $fyp1_grade;
        $this->fyp2_grade = $fyp2_grade;
        $this->project_id = $project_id;
    }

    function submitMark($db){
        $sql = "INSERT INTO assesment (fyp1, fyp2, grade, project_id, lect_id) VALUES($this->fyp1_grade, $this->fyp2_grade, $this->fyp1_grade + $this->fyp2_grade, $this->project_id,{$_SESSION["userId"]});";
        mysqli_query($db,$sql);
    }
}

?>