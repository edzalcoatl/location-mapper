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
        <title><?= $lang['category_list_view_titel'] ?></title>
    </head>
    <body>
        <div class="container">
            <?php include 'app/menu.php'; ?>
            <div class="py-5 text-center">
                <h2><?= $lang['category_list_view_titel'] ?></h2>
                <a href="category_add.php" role="button" class="btn btn-primary float-right" data-toggle="tooltip" data-placement="top" title="<?= $lang['add'] ?>"><i class="material-icons">add</i></a>
            </div>
            <?php 
            if($_REQUEST['error']==1) {
                echo '<div class="alert alert-danger" role="alert">'. $lang['record_error']. '</div>';
                die();
            }
            if($_REQUEST['delete']==1) echo '<div class="alert alert-success" role="alert">'. $lang['record_deleted']. '</div>'; 
            if($_REQUEST['update']==1) echo '<div class="alert alert-success" role="alert">'. $lang['record_updated']. '</div>'; 
            if($_REQUEST['insert']==1) echo '<div class="alert alert-success" role="alert">'. $lang['record_inserted']. '</div>'; 
            if($_REQUEST['delete'] || $_REQUEST['update'] || $_REQUEST['insert']) echo "<META http-equiv=\"refresh\" content=\"1;URL=categories_list_view.php\">";
            ?>
            <?php $categories_list = selectCategories(); ?>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="text-center"><?= $lang['category_list_view_id_field'] ?></th>
                                <th scope="col" class="text-center"><?= $lang['category_list_view_name_field'] ?></th>
                                <th scope="col" class="text-center"><?= $lang['category_list_view_color_field'] ?></th>
                                <th scope="col" class="text-center"> </th>
                            </tr>
                        </thead>
                        <tbody >
                            <?php foreach ($categories_list as $key => $value): ?>
                                <tr>
                                    <th scope="row" class="text-center"><?= $key; ?></th>
                                    <td class="text-center"><?= $categories_list[$key]['categoryName']; ?></td>
                                    <td class="text-center"><a href="" role="button" class="btn btn-dark btn-lg" style="background-color: <?= $categories_list[$key]['categoryColor']; ?>;"></a></td>
                                    <td class="text-center">
                                        <div class="btn-group " role="group" aria-label="Basic example">
                                            <span><a href="category_update.php?rid=<?= $key; ?>&mode=update" role="button" class="btn btn-dark btn-sm" data-toggle="tooltip" data-placement="top" title="<?= $lang['edit'] ?>"><i class="material-icons md-light">mode_edit</i></a></span>
                                            <span><a href="category_validate.php?mode=delete&rid=<?= $key; ?>" role="button" class="btn btn-dark btn-sm" data-toggle="tooltip" data-placement="top" title="<?= $lang['delete'] ?>"><i class="material-icons md-light">delete_forever</i></a></span>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>    
            </div>
            
        
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
        
    </body>
</html>