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
    !empty($wid) &&
    !empty($aid) &&
    !empty($performBy)){
        $tid = htmlspecialchars(strip_tags($tid));
        $wid = htmlspecialchars(strip_tags($wid));
        $aid = htmlspecialchars(strip_tags($aid));
        $allocTime = 
        $performBy = htmlspecialchars(strip_tags($performBy));
        $sql = "INSERT INTO allocated(task_id,worker_id,asset_id,allocatedTime,performBy) values($tid,$wid,$aid,now(),'$performBy')";
        if($conn->query($sql) === TRUE){
            http_response_code(201);
            echo json_encode(array("message" => "Task was allocated."));
        }
        else{
            http_response_code(503);
            echo json_encode(array("message" => "Unable to allocate task. DB Error"));
        }
    }
    else{
        http_response_code(400);
        echo json_encode(array("message" => "Unable to allocate task. Data is Incomplete."));
    }
}