<?php

require "connection.php";

$id = $_POST["answer_id"];
$mark = $_POST["mark"];


if(empty($mark)){
    echo ("Please enetr mark");
}  else {
    
$mark_rs = Database::search("SELECT * FROM `student_mark` WHERE `student_answers_id`='".$id."'");
$mark_num = $mark_rs->num_rows;

if($mark_num > 0){

    Database::iud("UPDATE `student_mark` SET `mark`= '".$mark."'
    WHERE `student_answers_id`='".$id."'");

    echo("success2");

} else{

    Database::iud("INSERT INTO `student_mark` 
    (`mark`,`student_answers_id`,`mark_status_id`) VALUES 
    ('".$mark."','".$id."','1')");

    echo "success";

}

}

?>