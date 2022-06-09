<?php
class Appointment{
    public $title;
    public $date;
    public $meeting_link;
    public $discussion;
    public $work_done;
    public $project_id;
    public $time;
    public $lect_id;


    function __construct($title, $date, $discussion, $work_done, $project_id, $lect_id, $time, $meeting_link)
    {
        $this->title = $title;
        $this->date = $date;
        $this->discussion = $discussion;
        $this->meeting_link = $meeting_link;
        $this->work_done = $work_done;
        $this->project_id = $project_id;
        $this->lect_id = $lect_id;
        $this->time = $time;

    }

    function addMeeting($db){
        $sql = "INSERT INTO appointment (title, date, discussion, work_done, project_id, lect_id,time, meeting_link) VALUES('$this->title', '$this->date', '$this->discussion', '$this->work_done', $this->project_id, '$this->lect_id', '$this->time', '$this->meeting_link')"; 
        mysqli_query($db,$sql);
    }
}

?>