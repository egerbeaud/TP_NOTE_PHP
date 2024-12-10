<?php

try
{
    //Connexion à la base de données
    //Modifiez les valeurs suivantes selon vos besoins
//(host, dbname, user, password)
//Le nom de votre base de données doit correspondre à celui que vous avez créé dans PhpMyAdmin

$host = "127.0.0.1";
$dbname = "tpnote";
$user = "root";
// $password = "mariadb";

//Creation de la connexion PDO
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user);
}
catch (Exception $e)
{
    //En cas d'eereur, on affiche un message et on arrete le script
    die('Erreur : '. $e->getMessage());
}