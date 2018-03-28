<?php include 'includes/functions.php'; ?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link href="resources/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!-- Icon Google Library -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Locations Map View</title>
        <link href="resources/css/map_style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container">
            <!-- Menu -->
            <?php include 'app/menu.html'; ?>
            <div class="py-5 text-center">
                <h2>Locations Map</h2>
                <a href="location_add.php" role="button" class="btn btn-primary float-right" data-toggle="tooltip" data-placement="top" title="Add Location"><i class="material-icons">add</i></a>
            </div>
            <?php $printXML = true;  $locations_list = selectLocations(false, $printXML); //Generate XML File with DB Locations list ?>
            <div class="row" style="padding-top:30px;">
                <div id="map"></div>
            </div>
        </div>
        <!-- Footer -->
        <?php include 'app/footer.html'; ?>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="resources/js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="resources/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="resources/js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <!-- Toggle Tooltips -->
        <script src="resources/js/toggle_tooltips.js" type="text/javascript"></script>
        <!-- Google API Map Script -->
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLjKB_vWwbnlf6gZuxRqkkKGdGZhRepvY&callback=initMap"></script>
        <script src="resources/js/render_map_all_locations.js" type="text/javascript"></script>
    </body>
</html>