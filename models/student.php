<?php
class Student {
    public $id;
    public $password;
    public $name;
    public $faculty;


    static function getName($db, $id){
        $sql = "SELECT name FROM student WHERE id = $id";
        $result = mysqli_query($db, $sql);
        $count = mysqli_num_rows($result);

        if($count == 1){  // will not return a result if there is more than one result becuse each student should only have one project
            while ($row = mysqli_fetch_array($result)) {
            return $row["name"];
            }
        }
    }
}
?>