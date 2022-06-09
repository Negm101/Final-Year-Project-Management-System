<?php
class Lecturer{
    public $name;
    public $password;

    
    public static function getName($lect_id, $db){
        $sql = "SELECT lect_name FROM lecturer WHERE id = $lect_id";
        $result = mysqli_query($db, $sql);
        $count = mysqli_num_rows($result);

        if($count == 1){  // will not return a result if there is more than one result becuse each student should only have one project
            while ($row = mysqli_fetch_array($result)) {
            return $row["lect_name"];
            }
        }
    }

}    

?>