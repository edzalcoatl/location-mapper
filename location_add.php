<?php include 'includes/functions.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="resources/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <title><?= $lang['location_add_page_title'] ?></title>
  </head>
  <body>
    <div class="container">
      <?php include 'app/menu.php'; ?>
      <div class="py-5 text-center">
        <h2><?= $lang['location_add_page_title'] ?></h2>
      </div>

      <div class="row justify-content-md-center">
        <div class="col-md-8">
            <?php if($_REQUEST['insert']==1) : ?>
            <div class="alert alert-success" role="alert"><?= $lang['record_inserted'] ?></div>
                <?php 
                echo "<META http-equiv=\"refresh\" content=\"1;URL=locations_list_view.php?insert=1\">";
                endif; 
                ?>
            <?php if($_REQUEST['error']==1) : ?>
                <div class="alert alert-danger" role="alert"><?= $lang['record_error'] ?></div>
            <?php endif; ?>
            <form action="location_validate.php?mode=add" method="POST" class="needs-validation" novalidate>
                <div class="mb-3">
                    <label for="Location Name"><?= $lang['location_add_location_name_field'] ?> *</label>
                    <input type="text" class="form-control" name="name" placeholder="Location Name" required>
                    <div class="invalid-feedback">
                        <?= $lang['location_add_location_name_error_msg'] ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="Location Category"><?= $lang['location_add_location_category_field'] ?> *</label>
                    <select class="form-control" name="category" required>
                        <?php $location_categories = selectLocationCategories(); ?>
                        <option value=""><?= $lang['location_add_location_select_category_field'] ?></option>
                        <?php foreach ($location_categories as $location_id => $location_name): ?>
                            <option value="<?= $location_id; ?>"><?= $location_name; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= $lang['location_add_location_name_error_msg'] ?>
                    </div>
                </div>    
                <div class="mb-3">
                    <label for="address"><?= $lang['location_add_location_address_field'] ?> *</label>
                    <input type="text" class="form-control" name="address" placeholder="1234 Main St" required>
                    <div class="invalid-feedback">
                        <?= $lang['location_add_location_name_error_msg'] ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="latitude"><?= $lang['location_add_location_latitude_field'] ?>  <span class="text-muted">(<?= $lang['optional_field'] ?>)</span></label>
                    <input type="number" class="form-control" name="latitude" placeholder="23.412" >
                    <div class="invalid-feedback">
                        <?= $lang['location_add_location_name_error_msg'] ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="longitude"><?= $lang['location_add_location_longitude_field'] ?>  <span class="text-muted">(<?= $lang['optional_field'] ?>)</span></label>
                    <input type="number" class="form-control" name="longitude" placeholder="50.661" >
                    <div class="invalid-feedback">
                        <?= $lang['location_add_location_name_error_msg'] ?>
                    </div>
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit" value="Submit"><?= $lang['location_add_location_add_button'] ?></button>
            </form>
        </div>
      </div>
      <?php include 'app/footer.php'; ?>
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