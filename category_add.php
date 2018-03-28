<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="resources/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="resources/css/bootstrap-colorpicker.css" rel="stylesheet" type="text/css"/>
    <title><?= $lang['category_add_page_titel'] ?></title>
  </head>
  <body>
    <div class="container">
      <?php include 'app/menu.php'; ?>  
      <div class="py-5 text-center">
        <h2><?= $lang['category_add_page_titel'] ?></h2>
      </div>

      <div class="row justify-content-md-center">
        <div class="col-md-8">
            <form action="category_validate.php?mode=add" method="POST" class="needs-validation" novalidate>
                <div class="mb-3">
                    <label for="category_name"><?= $lang['category_add_name_field'] ?></label>
                    <input type="text" class="form-control" name="category_name" placeholder="" required>
                    <div class="invalid-feedback">
                        <?= $lang['category_add_name_field_error_msg'] ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="category_color"><?= $lang['category_add_color_field'] ?></label>
                    <input type="text" style="width:auto" class="form-control" id="mycp" data-color="#6D2781" name="category_color" placeholder="" required>             
                    <div class="invalid-feedback">
                        <?= $lang['category_add_name_field_error_msg'] ?>
                    </div>
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit" value="Submit"><?= $lang['category_add_button'] ?></button>
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
    <script src="resources/js/bootstrap-colorpicker.min.js" type="text/javascript"></script>
    <!-- Initialize Tooltips -->
    <script src="resources/js/toggle_tooltips.js" type="text/javascript"></script>
    <!-- Validate Fields -->
    <script src="resources/js/form_validation.js" type="text/javascript"></script>
    <!-- Enable Color Picker -->
    <script src="resources/js/colorPicker.js" type="text/javascript"></script>
  </body>
</html>