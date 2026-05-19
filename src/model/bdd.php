<?php
    try{
        $user = "root";
        $pass = "";
        $db="freelanceIT";
        $host= "localhost";
        $dsn="mysql:host=$host;dbname=$db";
        $bdd = new PDO($dsn,$user, $pass);
    } catch(PDOException $e) {
        print "Erreur! :" .$e ->getmessage() . 
        "<br/>";
        die();
    }