<?php
include 'includes/functions.php';
$mode = htmlspecialchars($_REQUEST['mode']);
$rid = htmlspecialchars($_REQUEST['rid']);
$category_name = htmlspecialchars($_REQUEST['category_name']);
$category_color = htmlspecialchars($_REQUEST['category_color']);

//** Adding New Categories
if ($mode == "add") {
    //** Mysql Insert
    include 'database/location_db.php';
    $sql = "INSERT INTO location_categories (categoryName, categoryColor)
VALUES ('$category_name', '$category_color')";

    if ($conn->query($sql) === TRUE) {
        echo "<META http-equiv=\"refresh\" content=\"0;URL=categories_list_view.php?insert=1\">";
    } else {
        echo "Error";
    }
}

//** Updating New Categories
if ($mode == "update") {
    //** Mysql Insert
    include 'database/location_db.php';
    $sql = "UPDATE location_categories SET categoryName = '$category_name', categoryColor = '$category_color'
    WHERE categoryID = '$rid'";

    if ($conn->query($sql) === TRUE) {
        echo "<META http-equiv=\"refresh\" content=\"0;URL=categories_list_view.php?update=1\">";
    } else {
        echo "Error";
    }
}

//** Deleting New Categories
if ($mode == "delete") {
    $delete_category = deleteRecord($rid, 'location_categories', 'categoryID');
    if($delete_category) echo "<META http-equiv=\"refresh\" content=\"0;URL=categories_list_view.php?delete=1\">";
    else echo "<META http-equiv=\"refresh\" content=\"0;URL=categories_list_view.php?error=1\">";
}

$conn->close();
?>
