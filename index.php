<?php
    include ("view/layout/header.php");

$page = isset($_GET['page']) ?$_GET['page'] : 'index';

switch ($page):
    case"index":
        include("view/accueil/index.php");
        break;
    case"mission":
        include("view/mission/mission.php");
        break;
    case "freelance":
        include("view/freelance/freelance.php");
        break;
    case "connexion":
        include("view/connexion/connexion.php");
        break;
    case "ajouterMission":
        include("view/mission/ajouterMission.php");
        break;
    default :
        include("view/accueil/index.php");
        break;
endswitch;

    include ("view/layout/footer.php");
    ?>