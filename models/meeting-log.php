<?php 
class MeetingLog{
    public $work_done;
    public $work_to_be_done;
    public $problems_encounterd;
    public $comments;
    public $date;
    public $lect_id;
    public $student_id;


    function __construct($work_done, $work_to_be_done, $problems_encounterd, $comments, $date, $lect_id, $student_id){
        $this->work_done = $work_done;
        $this->work_to_be_done = $work_to_be_done;
        $this->problems_encounterd = $problems_encounterd;
        $this->comments = $comments;
        $this->date = $date;
        $this->lect_id = $lect_id;
        $this->student_id = $student_id;
    }

    function add($db){
        $sql = "INSERT INTO meeting_log (work_done, work_to_be_done, problems_encounterd, comments, `date`, lect_id, student_id) VALUES('$this->work_done', '$this->work_to_be_done', '$this->problems_encounterd', '$this->comments', '$this->date', $this->lect_id, $this->student_id);";
        mysqli_query($db,$sql);
    }

    static function getOne($db, $id){
        $sql = "SELECT * FROM meeting_log WHERE id = $id";
        $result = mysqli_query($db, $sql);
        $count = mysqli_num_rows($result);

        if($count == 1){  
            while ($row = mysqli_fetch_array($result)) {
            $meeting_log = new MeetingLog($row["work_done"], $row["work_to_be_done"], $row["problems_encounterd"], $row["comments"], $row["date"], $row["lect_id"], $row["student_id"]);
            return $meeting_log;
            }
        }
    }

}

?>