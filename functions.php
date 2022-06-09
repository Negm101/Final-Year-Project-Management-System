<?php
 
 function login($db,$stuId, $stuPassword){
    $sql = "SELECT id FROM student WHERE id = '$stuId' and password = '$stuPassword'";
    $result = mysqli_query($db,$sql);
    $count = mysqli_num_rows($result);
    return $count;
  }
  
  function registerStudent($db, $stuId, $password, $name, $faculty){
    $sql = "INSERT INTO student (id, name, password, faculty) VALUES($stuId, '$name', '$password', '$faculty');";
    mysqli_query($db,$sql);
  } 

  function loginLect($db,$lectId, $lectPassword){
    $sql = "SELECT id FROM lecturer WHERE id = '$lectId' and password = '$lectPassword'";
    $result = mysqli_query($db,$sql);
    $count = mysqli_num_rows($result);
    return $count;
  }
?>