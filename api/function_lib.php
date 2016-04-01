<?php

function writeLog($time,$user_id,$activity,$value) {
  $sqladd = "INSERT INTO `toeic`.`log` (`time`, `user_id`, `activity`, `value`)
              VALUES ('$attrid', '$userid', CURRENT_TIMESTAMP);";
  if($con->query($sqladd)){
    $response = array("status"=>"success","description"=>"add attribute success");
  }
}

?>
