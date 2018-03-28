<?php

################################################################################
## +---------------------------------------------------------------------------+
## | Function Extracts locations by ID or all Locations, creates a formated XML| 
## |   file for Google Maps API (Optional)s                                    | 
## +---------------------------------------------------------------------------+
function selectLocations($rid, $createXML){
    include_once('database/location_db.php');
    //Search for a specific location 
    if($rid){
        $query = "SELECT locationID, (SELECT categoryName FROM location_categories WHERE categoryID = locationCategory) as locationCategory, "
                . "(SELECT categoryColor FROM location_categories WHERE categoryID = locationCategory) as locationCategoryColor, "
                . "locationCategory AS locationCategoryID, locationName, locationAddress, locationLatitude, locationLongitude FROM locations "
                . "WHERE locationID = '$rid'";
        
    } else { //Search for all locations
        $query = "SELECT locationID, (SELECT categoryName FROM location_categories WHERE categoryID = locationCategory) as locationCategory, "
                . "(SELECT categoryColor FROM location_categories WHERE categoryID = locationCategory) as locationCategoryColor, "
                . "locationCategory AS locationCategoryID, locationName, locationAddress, locationLatitude, locationLongitude FROM locations "
                . "ORDER BY locationCategory ASC";
    }
    mysql_query("SET NAMES 'utf8'"); 
    $result = $conn->query($query);
    global $locations_array;
    $locations_array = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) { 
            $locations_array[$row['locationID']] = 
                            [
                            'locationID' => $row['locationID'],
                            'locationCategory' => $row['locationCategory'],
                            'locationCategoryID' => $row['locationCategoryID'],
                            'locationCategoryColor' => $row['locationCategoryColor'],
                            'locationName' => $row['locationName'],
                            'locationAddress' => $row['locationAddress'],
                            'locationLatitude' => $row['locationLatitude'],
                            'locationLongitude' => $row['locationLongitude'],
                            ];  
        }
    }
    
    $conn->close(); 
    
    
    ################################################################################
    ## +---------------------------------------------------------------------------+
    ## | Option to create the XML File for Google Maps   Make sure Read and Write  | 
    #  | Options are available in the folder                                       | 
    ## +---------------------------------------------------------------------------+

    if($createXML == 'true'){
        $xmlHeader = '<?xml version="1.0" encoding="UTF-8"?><markers>';
        foreach ($locations_array as $key => $value){
            $xmlBody .= '<marker id="'. $key . '" name="'. $locations_array[$key]['locationName'] . '" address="'. $locations_array[$key]['locationAddress'] . '" lat="'. $locations_array[$key]['locationLatitude'] . '" lng="'. $locations_array[$key]['locationLongitude'] . '" color="'. $locations_array[$key]['locationCategoryColor'] . '" type="'. $locations_array[$key]['locationCategory'] . '" />';                
                }
        $xmlFooter = '</markers>';
        $xmlString = "$xmlHeader $xmlBody $xmlFooter";
        $dom = new DOMDocument;
        $dom->preserveWhiteSpace = FALSE;
        $dom->loadXML($xmlString);

        //Save XML as a file
        $dom->save('resources/xml/markers.xml');     
        }
        
        return $locations_array;
}

################################################################################
## +---------------------------------------------------------------------------+
## | Function to select Location Categories                                    | 
## +---------------------------------------------------------------------------+
function selectCategories($rid){
    include_once('database/location_db.php');
    if($rid){
       $query = "SELECT categoryID, categoryName, categoryColor FROM location_categories "
            . "WHERE categoryID = '$rid'"; 
    } else {
       $query = "SELECT categoryID, categoryName, categoryColor FROM location_categories "
            . "ORDER BY categoryID DESC"; 
    }
    mysql_query("SET NAMES 'utf8'"); 
    $result = $conn->query($query);
    $categories_array = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) { 
            $categories_array[$row['categoryID']] = 
                            [
                            'categoryName' => $row['categoryName'],
                            'categoryColor' => $row['categoryColor'],
                            ];  
        }
    }
    $conn->close(); 
    return $categories_array;
}
################################################################################
## +---------------------------------------------------------------------------+
## | Function to Delete Records (Locations or Categories)                      | 
## +---------------------------------------------------------------------------+
function deleteRecord($id, $tableName, $columnName){
    // Create connection
    include_once('database/location_db.php');
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        return false;
    } 

    // sql to delete a record
    $sql = "DELETE FROM $tableName WHERE $columnName = '$id'";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
    $conn->close();
     
}

################################################################################
## +---------------------------------------------------------------------------+
## | Function to Select Location Categories                                    | 
## +---------------------------------------------------------------------------+
function selectLocationCategories(){
    include_once('database/location_db.php');
    $query_cats = "SELECT categoryID, categoryName FROM location_categories";
    $conn_cats = new mysqli($servername, $username, $password, $dbname);
    $result_cats = $conn_cats->query($query_cats);
    $location_categories_array = [];
    if ($result_cats->num_rows > 0) {
        while($row_cats = $result_cats->fetch_assoc()) {
            $location_categories_array[$row_cats['categoryID']] = $row_cats['categoryName'];
        }
    }
    return $location_categories_array;
    $conn2->close();
  
}

################################################################################
## +---------------------------------------------------------------------------+
## | Function to Search for Location Coordenates and Std. Address Via Google   |
#  | Maps API                                                                  | 
## +---------------------------------------------------------------------------+
function getLocationCoordenates($address){
    $prepAddr = str_replace(' ','+',$address);
    $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
    $output= json_decode($geocode);
    $latitude = $output->results[0]->geometry->location->lat;
    $longitude = $output->results[0]->geometry->location->lng;
    return array($latitude, $longitude);
}

################################################################################
## +---------------------------------------------------------------------------+
## | function to geocode address, it will return false if unable to geocode     |
#  | address                                                                    | 
## +---------------------------------------------------------------------------+
// 
function geocode($address){
 
    // url encode the address
    $address = urlencode($address);
     
    // google map geocode api url
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyBLjKB_vWwbnlf6gZuxRqkkKGdGZhRepvY";
 
    // get the json response
    $resp_json = file_get_contents($url);
     
    // decode the json
    $resp = json_decode($resp_json, true);
 
    // response status will be 'OK', if able to geocode given address 
    if($resp['status']=='OK'){
 
        // get the important data
        $lati = isset($resp['results'][0]['geometry']['location']['lat']) ? $resp['results'][0]['geometry']['location']['lat'] : "";
        $longi = isset($resp['results'][0]['geometry']['location']['lng']) ? $resp['results'][0]['geometry']['location']['lng'] : "";
        $formatted_address = isset($resp['results'][0]['formatted_address']) ? $resp['results'][0]['formatted_address'] : "";
         
        // verify if data is complete
        if($lati && $longi && $formatted_address){
         
            // put the data in the array
            $data_arr = array();            
             
            array_push(
                $data_arr, 
                    $lati, 
                    $longi, 
                    $formatted_address
                );
             
            return $data_arr;
             
        }else{
            return false;
        }
         
    }
 
    else{
        echo "<strong>ERROR: {$resp['status']}</strong>";
        return false;
    }
}

?>
