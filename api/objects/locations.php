<?php
class Location{
 
    // database connection and table name
    private $conn;
    private $table_name = "locations";
 
    // object properties
    public $id;
    public $category;
    public $name;
    public $address;
    public $latitude;
    public $longitude;
    
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    
    // read locations
    function read(){

        // select all query
        $query = "SELECT locationID, locationName, (SELECT categoryName FROM location_categories WHERE categoryID = locationCategory) AS locationCategory, locationAddress, locationLatitude, locationLongitude FROM " . $this->table_name . " ORDER BY locationID DESC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
    
    // create location
    function create(){

        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    locationName=:name, locationCategory=:cateogory, locationAddress=:address, locationLatitude=:latitude, locationLongitude=:longitude";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->category=htmlspecialchars(strip_tags($this->category));
        $this->address=htmlspecialchars(strip_tags($this->address));
        $this->latitude=htmlspecialchars(strip_tags($this->latitude));
        $this->longitude=htmlspecialchars(strip_tags($this->longitude));

        // bind values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":category", $this->category);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":latitude", $this->latitude);
        $stmt->bindParam(":longitude", $this->longitude);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;

    }
    
    // used when filling up the update product form
    function readOne(){

        // query to read single record
        $query = "SELECT locationID, locationName, (SELECT categoryName FROM location_categories WHERE categoryID = locationCategory) AS locationCategory, locationAddress, locationLatitude, locationLongitude FROM " . $this->table_name . " WHERE locationID = ? LIMIT 0,1";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->name = $row['locationName'];
        $this->category = $row['locationCategory'];
        $this->address = $row['locationAddress'];
        $this->latitude = $row['locationLatitude'];
        $this->longitude = $row['locationLongitude'];
    }
}



?>