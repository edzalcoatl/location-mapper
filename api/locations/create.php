<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
 
// instantiate product object
include_once '../objects/product.php';
 
$database = new Database();
$db = $database->getConnection();
 
$location = new Location($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set location property values
$location->name = $data->locationName;
$location->category = $data->locationCategory;
$location->address = $data->locationAddress;
$location->latitude = $data->locationLatitude;
$location->longitude = $data->locationLongitude;

 
// create the location
if($location->create()){
    echo '{';
        echo '"message": "Location was created."';
    echo '}';
}
 
// if unable to create the location, tell the user
else{
    echo '{';
        echo '"message": "Unable to create location."';
    echo '}';
}
?>