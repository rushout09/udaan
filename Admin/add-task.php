<?php 
$servername = "localhost";
$dbname = "udaanapi";
$conn = new mysqli($servername,"root","",$dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
    http_response_code(404);
    echo json_encode(array("message" => "Connection Error."));
}
else{
    extract($_POST);
    if(!empty($tid) &&
    !empty($tname) &&
    !empty($aid)){
        $tid = htmlspecialchars(strip_tags($tid));
        $tname = htmlspecialchars(strip_tags($tname));
        $aid = htmlspecialchars(strip_tags($aid));
        $sql = "INSERT INTO tasks(task_id,task_name,asset_id) values($tid,'$tname',$aid)";
        if($conn->query($sql) === TRUE){
            http_response_code(201);
            echo json_encode(array("message" => "Task was created."));
        }
        else{
            http_response_code(503);
            echo json_encode(array("message" => "Unable to create task. DB Error"));
        }
    }
    else{
        http_response_code(400);
        echo json_encode(array("message" => "Unable to create task. Data is Incomplete."));
    }
}