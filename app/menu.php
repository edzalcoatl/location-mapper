<?php include 'includes/lang.php' ?>
<!-- Navigation Menu --> 
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="locations_map_view.php"><?= $lang['app_name'];?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="locations_map_view.php"><?= $lang['map_link'];?></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= $lang['locations_link'];?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="location_add.php"><?= $lang['locations_add'];?></a>
                    <a class="dropdown-item" href="locations_list_view.php"><?= $lang['locations_view'];?></a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Location Categories
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="category_add.php"><?= $lang['categories_add'];?></a>
                    <a class="dropdown-item" href="categories_list_view.php"><?= $lang['categories_view'];?></a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= $lang['lang'];?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="index.php?la=eng"><?= $lang['lang-eng']; ?></a>
                    <a class="dropdown-item" href="index.php?la=fre"><?= $lang['lang-ger']; ?></a>
                </div>
            </li>
            

        </ul>
        
    </div>
</nav>
<!-- Navigation Menu END --> 