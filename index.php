<?php
session_start();

ob_start();

include ("src/view/layout/header.php");

$page = isset($_GET['page']) ?$_GET['page'] : 'index';

switch ($page):
    case"index":
        include("src/view/accueil/index.php");
        break;
    case"mission":
        include("src/view/mission/mission.php");
        break;
    case "detailMission":
        include("src/view/mission/detailMission.php");
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
    case "controller_ajouterMission":
        include("src/controller/mission/ajouterMission.php");
        break;
    case "apropos":
        include("src/view/apropos/apropos.php");
        break;
    case "contact":
        include("src/view/contact/contact.php");
        break;
    case "comment_fonctionne":
        include("src/view/apropos/comment_fonctionne.php");
        break;
    case "guide_qualite":
        include("src/view/apropos/guide_qualite.php");
        break;
    case "conditions_utilisation":
        include("src/view/apropos/conditions_utilisation.php");
        break;
    case "philosophie":
        include("src/view/apropos/philosophie.php");
        break;
    case "devenir_freelance":
        include("src/view/freelance/devenir_freelance.php");
        break;
    case "information_freelance":
        include("src/view/freelance/information_freelance.php");
        break;
    case "financement_freelance":
        include("src/view/freelance/financement_freelance.php");
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
    case "deconnexion":
        include("src/controller/login/deconnexion.php");
        break;
    case "profil_public":
        include("src/view/freelance/afficher_profil.php");
        break;
    case "controller_profil_public":
        include("src/controller/freelance/afficher_profil.php");
        break;
    case "profil":
        include("src/controller/profil/mon_espace.php");
    break;
    case "candidatures":
        include("src/controller/candidatures/candidatures.php");
        include("src/view/candidatures/candidatures.php");
        break;
    case "soumettreProposition":
        include("src/controller/mission/soumettreProposition.php");
        break;
    case "dashboard":
        include("src/view/accueil/dashboard.php");
    break;
    case "profil_client":
        include("src/view/profil/profil_client.php");
        break;
    default :
        include("src/view/accueil/index.php");
        break;
endswitch;

    include ("src/view/layout/footer.php");
    ?>