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
    $sql = "SELECT * from assets";
    if($result = $conn->query($sql)){
        if($result->num_rows>0){
            while($row = $row = $result->fetch_assoc()){
                $asset_array = array();
                extract($row);
                $asset = array("asset_id"=>$asset_id, "asset_name" => $asset_name );
                array_push($asset_array,$asset);
            }
            http_response_code(200);
            echo json_encode($asset_array);
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