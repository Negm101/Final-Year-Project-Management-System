<?php 
    class Goal{
        public $id;
        public $goal;
        public $date;
        public $status;
        public $project_id;
        
        function __construct($goal, $date, $status, $project_id){
            $this->goal = $goal;
            $this->date = $date;
            $this->status = $status;
            $this->project_id = $project_id;
        }

        function add($db){
            $sql = "INSERT INTO goal (goal_name, start_date, status, project_id) VALUES('$this->goal', '$this->date', '$this->status', $this->project_id);";
            mysqli_query($db,$sql);
        }

        static function delete($db, $id){
            $sql = "DELETE FROM goal WHERE id=$id;";
            mysqli_query($db,$sql);
        }

        static function done($db, $id){
            $sql = "UPDATE goal SET status='Completed' WHERE goal_id=$id;";
            mysqli_query($db,$sql);
        }

    }

?>