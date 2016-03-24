<?php
header('Content-Type: application/json');
include "dbconnect.php";

//get parameters
$mode = $con->real_escape_string($_GET['mode']);

//initial var
$response = array(
                  "status"    =>    "failed",
                  "comment"   =>    "error before initial process success",
                  "data"      =>    ""
                 );

//logic part

if($mode == "all"){
  $sql = "SELECT * FROM `vocabulary`";
}elseif ($mode == "no_meaning") {
  $sql = "SELECT * FROM `vocabulary` WHERE `meaning` IS NULL";
}elseif ($mode == "1_no_meaming") {
  $sql = "SELECT * FROM vocabulary WHERE meaning IS NULL ORDER BY rand() LIMIT 1";
}else{
  $sql = "error";
}



if($sql != "error"){
  $db_result = $con->query($sql);
  if($db_result->num_rows > 0){
    $data = array();
    while($row = $db_result->fetch_assoc()){
      $eachrow = array(
                          "id"      =>  $row["id"],
                          "vocab"   =>  $row["vocab"],
                          "meaning" =>  $row["meaning"],
                          "remark"  =>  $row["remark"]
                      );
      array_push($data,$eachrow);
    }
    $response["data"] = $data;
    $response["comment"] = "";
    $response["status"] = "success";
  }
}else{
  $response["comment"] = 'mode error';
}



echo json_encode($response);
?>
