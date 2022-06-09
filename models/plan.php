<?php
    class Plan{
        public $id;
        public $plan;
        public $start_date;
        public $end_date;
        public $status;
        public $project_id;

        function __construct($plan, $start_date, $status, $project_id, $end_date){
            $this->plan = $plan;
            $this->start_date = $start_date;
            $this->end_date = $end_date;
            $this->status = $status;
            $this->project_id = $project_id;
        }

        function add($db){
            
            $sql = "INSERT INTO plan (plans, sart_date, end_date, status, project_id) VALUES('$this->plan', '$this->start_date', '$this->end_date', '$this->status', $this->project_id);";
            mysqli_query($db,$sql);
        }

        static function delete($db, $id){
            $sql = "DELETE FROM plan WHERE id=$id;";
            mysqli_query($db,$sql);
        }

        static function done($db, $id){
            $sql = "UPDATE plan SET status='Completed' WHERE id=$id;";
            mysqli_query($db,$sql);
        }


    }
?>