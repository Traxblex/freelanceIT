<?php
    include ("src/view/layout/header.php");

$page = isset($_GET['page']) ?$_GET['page'] : 'index';

switch ($page):
    case"index":
        include("src/view/accueil/index.php");
        break;
    case"mission":
        include("src/view/mission/mission.php");
        break;
    case "freelance":
        include("src/view/freelance/freelance.php");
        break;
    case "connexion":
        include("src/view/login/connexion.php");
        break;
    case "inscription":
        include("src/view/login/inscription.php");
        break;
    case "oublierMotDePasse":
        include("src/view/login/oublierMotDePasse.php");
        break;
    case "ajouterMission":
        include("src/view/mission/ajouterMission.php");
        break;
    case "ajouterFreelance":
        include("src/view/freelance/ajouterFreelance.php");
        break;
    case "apropos":
        include("src/view/apropos/apropos.php");
        break;
    case "contact":
        include("src/view/contact/contact.php");
        break;
    case "profil":
        include("src/view/profil/profil.php");
        break;
    case "apropos":
        include("src/view/apropos/apropos.php");
        break;
    case"faq":
        include("src/view/apropos/faq.php");
        break;
    default :
        include("src/view/accueil/index.php");
        break;
endswitch;

    include ("src/view/layout/footer.php");
    ?>