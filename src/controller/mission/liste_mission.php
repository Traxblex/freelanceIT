<?php
include('model/bdd.php');
$req = $bdd->prepare("SELECT * FROM missions");
$req->execute();

$allMembres = $req->fetchAll();


?>