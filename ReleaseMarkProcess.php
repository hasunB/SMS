<?php

require "connection.php";

if(isset($_GET["id"])){
    
    $id = $_GET["id"];
    
    //search the mark results from the database
    $mark_search_rs = Database::search("SELECT * FROM `student_mark`
    WHERE `student_answers_id`='".$id."'");
    $mark_search_num = $mark_search_rs->num_rows; //take the number of results

    if($mark_search_num == 1){
        $mark_search_data = $mark_search_rs->fetch_assoc(); //extract the mark data

        if($mark_search_data["mark_status_id"] == 1){

            //update the mark data
            Database::iud("UPDATE `student_mark` SET `mark_status_id`='2' WHERE `student_answers_id`='".$id."'");
            echo("success2");

        } else if ($mark_search_data["mark_status_id"] == 2){

            //update the mark data
            Database::iud("UPDATE `student_mark` SET `mark_status_id`='1' WHERE `student_answers_id`='".$id."'");
            echo("success");

        }

    } else {
        echo("File Not Found");
    }

} else {
    echo("Something Went Wrong");
}


?>