<?php
include 'includes/functions.php';
$mode = htmlspecialchars($_REQUEST['mode']);
$rid = htmlspecialchars($_REQUEST['rid']);

//** Location ADd Mode
if($mode == 'add'){
    $name = htmlspecialchars($_REQUEST['name']);
    $category = htmlspecialchars($_REQUEST['category']);
    $address = htmlspecialchars($_REQUEST['address']);
    $latitude = htmlspecialchars($_REQUEST['latitude']);
    $longitude = htmlspecialchars($_REQUEST['longitude']);

    //** If Latitud and Longitude Values are not inserted search values with google geocode
    if(!$latitude || !$longitude){
        //**Get Location's Coordinates
        //$coordinates = getLocationCoordenates($address);
        $coordinates = geocode($address);

        //** If Coordinates where found we insert data
        if($coordinates){
            //** Mysql Insert
            include 'database/location_db.php';
            $sql = "INSERT INTO locations (locationName, locationCategory, locationAddress, locationLatitude, locationLongitude)
            VALUES ('$name', '$category', '$coordinates[2]', '$coordinates[0]', '$coordinates[1]')";

            if ($conn->query($sql) === TRUE) {
                echo "<META http-equiv=\"refresh\" content=\"0;URL=locations_list_view.php?insert=1\">";
            } else {
                echo "Error";
            }
            $conn->close(); 
        } else {
            echo "<META http-equiv=\"refresh\" content=\"0;URL=location_add.php?error=1\">";
        }
    } else {
            //** Mysql Insert
            include 'database/location_db.php';
            $sql = "INSERT INTO locations (locationName, locationCategory, locationAddress, locationLatitude, locationLongitude)
            VALUES ('$name', '$category', '$address', '$latitude', '$longitude')";

            if ($conn->query($sql) === TRUE) {
                echo "<META http-equiv=\"refresh\" content=\"0;URL=locations_list_view.php?insert=1\">";
            } else {
                echo "Error";
            }
            $conn->close(); 
    }
}

//** Location Update Mode
if($mode == 'update'){
    $rid = htmlspecialchars($_REQUEST['rid']);
    $name = htmlspecialchars($_REQUEST['name']);
    $category = htmlspecialchars($_REQUEST['category']);
    $address = htmlspecialchars($_REQUEST['address']);
    $latitude = htmlspecialchars($_REQUEST['latitude']);
    $longitude = htmlspecialchars($_REQUEST['longitude']);

    //** If Latitud and Longitude Values are not inserted search values with google geocode
    if(!$latitude || !$longitude){
        //**Get Location's Coordinates
        //$coordinates = getLocationCoordenates($address);
        $coordinates = geocode($address);

        //** If Coordinates where found we insert data
        if($coordinates){
            //** Mysql Insert
            include 'database/location_db.php';
            $sql = "UPDATE locations SET locationName = '$name', locationCategory='$category', "
                    . "locationAddress = '$coordinates[2]', "
                    . "locationLatitude = '$coordinates[0]', "
                    . "locationLongitude = '$coordinates[1]' "
                    . "WHERE locationID = '$rid'";

            if ($conn->query($sql) === TRUE) {
                echo "<META http-equiv=\"refresh\" content=\"0;URL=locations_list_view.php?update=1\">";
            } else {
                echo "Error";
            }
            $conn->close(); 
        } else {
            echo "<META http-equiv=\"refresh\" content=\"0;URL=location_add.php?error=1\">";
        }
    } else {
            //** Mysql Insert
            include 'database/location_db.php';
            $sql = "UPDATE locations SET locationName = '$name', locationCategory='$category', "
                    . "locationAddress = '$address', "
                    . "locationLatitude = '$latitude', "
                    . "locationLongitude = '$longitude' "
                    . "WHERE locationID = '$rid'";

            if ($conn->query($sql) === TRUE) {
                echo "<META http-equiv=\"refresh\" content=\"0;URL=locations_list_view.php?update=1\">";
            } else {
                echo "Error";
            }
            $conn->close(); 
    }
}

//** Location Delete Mode
if($mode == 'delete'){
    $delete_location = deleteRecord($rid, 'locations', 'locationID');
    if($delete_location) echo "<META http-equiv=\"refresh\" content=\"0;URL=locations_list_view.php?delete=1\">";
    else echo "<META http-equiv=\"refresh\" content=\"0;URL=locations_list_view.php?error=1\">";
} 


?>
