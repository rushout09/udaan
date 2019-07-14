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
    if(!empty($wid) &&
    !empty($wname)){
        $wid = htmlspecialchars(strip_tags($wid));
        $wname = htmlspecialchars(strip_tags($wname));
        $sql = "INSERT INTO workers(worker_id,name) values($wid,'$wname')";
        if($conn->query($sql) === TRUE){
            http_response_code(201);
            echo json_encode(array("message" => "Worker was created."));
        }
        else{
            http_response_code(503);
            echo json_encode(array("message" => "Unable to create Worker. DB Error"));
        }
    }
    else{
        http_response_code(400);
        echo json_encode(array("message" => "Unable to create Worker. Data is Incomplete."));
    }
}