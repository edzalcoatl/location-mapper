<?php include 'includes/functions.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="resources/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <title>Location Update</title>
  </head>
  <body>
    <div class="container">
      <?php include 'app/menu.html'; ?>
      <div class="py-5 text-center">
        <h2>Location Update</h2>
      </div>

      <div class="row justify-content-md-center">
        <div class="col-md-8">
            <?php $locations_list = selectLocations($_REQUEST['rid'],false); //Get Location Information?>
            <?php 
            foreach ($locations_list as $key => $value){ 
                $location_name = $locations_list[$key]['locationName']; 
                $location_category_name = $locations_list[$key]['locationCategory']; 
                $location_category_id = $locations_list[$key]['locationCategoryID']; 
                $location_address = $locations_list[$key]['locationAddress'];
                $location_latitude = $locations_list[$key]['locationLatitude'];
                $location_longitude = $locations_list[$key]['locationLongitude'];
            } 
            ?>
            <!-- Form -->
            <form action="location_validate.php?mode=update&rid=<?= $_REQUEST['rid']; ?>" method="POST" class="needs-validation" novalidate>
                <div class="mb-3">
                    <label for="Location Name">Location Name *</label>
                    <input type="text" class="form-control" name="name" value="<?= $location_name; ?>" required>
                    <div class="invalid-feedback">
                        Please enter a valid Location Name.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="Location Category">Category *</label>
                    <select class="form-control" name="category" required>
                        <?php $location_categories = selectLocationCategories(); ?>
                        <option value="">Select Category</option>
                        <option value="<?= $location_category_id ?>" selected="selected"><?= $location_category_name ?></option>
                        <?php foreach ($location_categories as $location_id => $location_name): ?>
                            <option value="<?= $location_id; ?>"><?= $location_name; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        Please enter a valid Location Category.
                    </div>
                </div>   
                <div class="mb-3">
                    <label for="address">Address *</label>
                    <input type="text" class="form-control" name="address" value="<?= $location_address; ?>" required>
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="latitude">Latitude  <span class="text-muted">(Optional)</span></label>
                    <input type="number" class="form-control" name="latitude" value="<?= $location_latitude; ?>" >
                    <div class="invalid-feedback">
                        Please a valid Latitude for the Location.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="longitude">Longitude  <span class="text-muted">(Optional)</span></label>
                    <input type="number" class="form-control" name="longitude" value="<?= $location_longitude; ?>" >
                    <div class="invalid-feedback">
                        Please a valid Longitud for the Location.
                    </div>
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">Update Location</button>
            </form>
        </div>
      </div>
      <?php include 'app/footer.html'; ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="resources/js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="resources/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="resources/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <!-- Initialize Tooltips -->
    <script src="resources/js/toggle_tooltips.js" type="text/javascript"></script>
    <!-- Validate Fields -->
    <script src="resources/js/form_validation.js" type="text/javascript"></script>
  </body>
</html>