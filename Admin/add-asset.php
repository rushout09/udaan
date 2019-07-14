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
    if(!empty($aid) &&
    !empty($aname)){
        $aid = htmlspecialchars(strip_tags($aid));
        $aname = htmlspecialchars(strip_tags($aname));
        $sql = "INSERT INTO assets(asset_id,asset_name) values($aid,'$aname')";
        if($conn->query($sql) === TRUE){
            http_response_code(201);
            echo json_encode(array("message" => "Asset was created."));
        }
        else{
            http_response_code(503);
            echo json_encode(array("message" => "Unable to create Asset. DB Error"));
        }
    }
    else{
        http_response_code(400);
        echo json_encode(array("message" => "Unable to create Asset. Data is Incomplete."));
    }
}