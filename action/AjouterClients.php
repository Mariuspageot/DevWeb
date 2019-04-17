<?php

require_once '../Config.php';
$nom= filter_input(INPUT_POST, "Nom");

$db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME , Config::USER , Config::PASSWORD);
$r = $db->prepare("insert into clients(NomC)"." values ( :Nom)");
$r->bindParam(":Nom",$nom);

$r->execute();

header("location: ../vue/Liste-clients.php")
?>