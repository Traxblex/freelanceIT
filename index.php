<?php
    include ("view/layout/header.php");

$page = isset($_GET['page']) ?$_GET['page'] : 'index';

switch ($page):
    case"index":
        include("view/user/index.php");
        break;
    default :
        include("view/user/index.php");
        break;
endswitch;

    include ("view/layout/footer.php");
    ?>