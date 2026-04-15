<?php

    try{
        $user = "root";
        $pass = "";
        $db="freelanceit";
        $host= "localhost";
        $dsn="mysql:host=$host;dbname=$db";
        $bdd = new PDO($dsn,$user, $pass);
    } catch(PDOException $e) { //try catch pour gérer les erreurs de connexion à la base de données. le try catch est une structure de contrôle qui permet de gérer les erreurs en essayant d'exécuter un code et en attrapant l'erreur si elle se produit. le PDOException est une classe d'exception qui est levée lorsque une erreur se produit lors de l'utilisation de PDO. le getMessage() est une méthode qui permet de récupérer le message d'erreur de l'exception. et $e est une variable qui contient l'exception levée.
        print "Erreur! :" .$e ->getmessage() . 
        "<br/>";
        die();
    }