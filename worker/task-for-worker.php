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
    extract($_GET);

    $sql = "SELECT * from allocated where wid=$_GET['wid']";
    if($result = $conn->query($sql)){
        if($result->num_rows>0){
            $task_array = array();
            $row = $result->fetch_assoc();
            extract($row);
            $task = array("task_id"=>$task_id,
            "task_name"=>$task_name);
            array_push($task_array,$task);
            http_response_code(200);
            echo json_encode($task_array);
        }
        else{
            http_response_code(404);
            echo json_encode(array("message" => "No assets found."));
        }
    }
    else{
        http_response_code(503);
        echo json_encode(array("message" => "Unable to access Assets. DB Error"));
    }
}