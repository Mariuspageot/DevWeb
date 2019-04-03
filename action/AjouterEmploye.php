<?php
/**
 * Created by PhpStorm.
 * User: Marius PAGEOT
 * Date: 11/03/2019
 * Time: 15:57
 */
require_once '../Config.php';
$nom= filter_input(INPUT_POST, "Nom");
$prenom=filter_input (INPUT_POST,"Prenom");
$Grade=filter_input (INPUT_POST,"Grade");
$IDM=filter_input (INPUT_POST,"IDM");
$Status=filter_input (INPUT_POST,"Status");
$db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME , Config::USER , Config::PASSWORD);
$r = $db->prepare("insert into employees (NomE,PrenomE,Grade,NomMetier,Statue)"." values (:Nom, :prenom, :Grade, :IDM, :Statue,)");

$r->bindParam(":Nom",$nom);
$r->bindParam(":prenom",$prenom);
$r->bindParam(":Grade",$Grade);
$r->bindParam(":IDM",$IDM);
$r->bindParam(":Status",$Status);

$r->execute();
?>