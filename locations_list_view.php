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
        <link href="resources/css/map_style.css" rel="stylesheet" type="text/css"/>
        <title><?= $lang['location_list_page_title'] ?></title>
    </head>
    <body>
        <div class="container">
            <!-- Menu -->
            <?php include 'app/menu.php'; ?>
            <div class="py-5 text-center">
                <h2><?= $lang['location_list_page_title'] ?></h2>
                <a href="location_add.php" role="button" class="btn btn-primary float-right" data-toggle="tooltip" data-placement="top" title="<?= $lang['add'] ?>"><i class="material-icons">add</i></a>
            </div>
            <?php 
            if($_REQUEST['error']==1) {
                echo '<div class="alert alert-danger" role="alert">'. $lang['record_error'].'</div>';
                die();
            }
            if($_REQUEST['delete']==1) echo '<div class="alert alert-success" role="alert">'. $lang['record_deleted']. '</div>'; 
            if($_REQUEST['update']==1) echo '<div class="alert alert-success" role="alert">'. $lang['record_updated']. '</div>'; 
            if($_REQUEST['insert']==1) echo '<div class="alert alert-success" role="alert">'. $lang['record_inserted']. '</div>'; 
            if($_REQUEST['delete'] || $_REQUEST['update'] || $_REQUEST['insert']) echo "<META http-equiv=\"refresh\" content=\"1;URL=locations_list_view.php\">";
            ?>
            <?php $locations_list = selectLocations(); //Get locations array?>
            <!-- Display Locations on Bootstrap Cards  -->
            <div class="row ">
            <?php foreach ($locations_list as $key => $value): ?>
                <div class="card border-secondary " style="max-width: 18rem; margin-left: 10px; margin-top: 30px;">
                    <div class="card-header"><?= $locations_list[$key]['locationCategory']; ?>
                        <div class="btn-group float-right" role="group" aria-label="Basic example">
                            <span data-toggle="modal" data-target="#exampleModal"><a id="LoadMapLink" href="#" role="button" class="btn btn-dark btn-sm"  onClick="initMap(<?= $locations_list[$key]['locationLatitude']; ?>, <?= $locations_list[$key]['locationLongitude']; ?>, '<?= $locations_list[$key]['locationName']; ?>', '<?= $locations_list[$key]['locationCategoryColor']; ?>')" data-toggle="tooltip" data-placement="top" title="<?= $lang['view'] ?>"><i class="material-icons md-light">pageview</i></a></span>
                            <span><a href="location_update.php?rid=<?= $key; ?>&mode=update" role="button" class="btn btn-dark btn-sm" data-toggle="tooltip" data-placement="top" title="<?= $lang['edit'] ?>"><i class="material-icons md-light">mode_edit</i></a></span>
                            <span><a href="location_validate.php?rid=<?= $key; ?>&mode=delete" role="button" class="btn btn-dark btn-sm" data-toggle="tooltip" data-placement="top" title="<?= $lang['delete'] ?>"><i class="material-icons md-light">delete_forever</i></a></span>
                        </div>
                    </div>
                    <div class="card-body text-secondary">
                        <h5 class="card-title"><?= $locations_list[$key]['locationName']; ?></h5>
                        <p class="card-text"><?= $locations_list[$key]['locationAddress']; ?></p>
                        <a id="LoadMapLink" href="#" onClick="initMap(<?= $locations_list[$key]['locationLatitude']; ?>, <?= $locations_list[$key]['locationLongitude']; ?>, '<?= $locations_list[$key]['locationName']; ?>', '<?= $locations_list[$key]['locationCategoryColor']; ?>')" data-toggle="modal" data-target="#exampleModal"><p class="card-text text-center" style="color:<?= $locations_list[$key]['locationCategoryColor']; ?>;"><i class="material-icons">add_location</i><?= $locations_list[$key]['locationLatitude'] . " " . $locations_list[$key]['locationLongitude']; ?></p></a>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Location</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div id="map"></div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- Footer -->
        <?php include 'app/footer.php'; ?>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="resources/js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="resources/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="resources/js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <!-- Google API Map Script -->
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLjKB_vWwbnlf6gZuxRqkkKGdGZhRepvY&callback=initMap"></script>
        <!-- Initialize Tooltips -->
        <script src="resources/js/toggle_tooltips.js" type="text/javascript"></script>
        <script src="resources/js/render_map.js" type="text/javascript"></script>
        <!-- Render Map -->
      </script>
    </body>
</html>