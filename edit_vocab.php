<?php
header('Content-Type: application/json');
include "dbconnect.php";
include "function_lib.php";

//get parameters
$word_id = $con->real_escape_string($_GET['word_id']);

//initial var
$response = array(
                  "status"    =>    "failed",
                  "comment"   =>    "error before initial process success",
                  "data"      =>    ""
                 );



//logic part
if(validate_word_id($word_id)){

}

echo json_encode($response);
?>
