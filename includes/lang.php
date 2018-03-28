<?php
session_start();
if($_GET['la']){
    $_SESSION['la'] = $_GET['la'];
    header('Location:'.$_SERVER['PHP_SELF']);
    exit();
}

switch($_SESSION['la']){
     case "eng":
        require('resources/lang/eng.php');
    break;
    case "ger":
        require('resources/lang/ger.php');
    break;
    default:
        require('resources/lang/eng.php');
    }
?>