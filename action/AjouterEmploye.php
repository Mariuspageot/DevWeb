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
$NomMetier=filter_input (INPUT_POST,"NomMetier");
$Status=filter_input (INPUT_POST,"Status");
$Login=filter_input (INPUT_POST,"Login");
$pwd=filter_input (INPUT_POST,"pwd");
$db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME , Config::USER , Config::PASSWORD);
$rr = $db->prepare("select ID, NomMetier from metier");

$rr->execute();

$IDMs=$rr->fetchAll();

foreach ($IDMs as $IDM){
 if ($IDM["NomMetier"]==$NomMetier){
    $ID = $IDM["ID"];
 }
}

$r = $db->prepare("insert into employees (NomE,PrenomE,IDMetier,Status,Login,Password)"." values ( :Nom, :prenom, :IDM, :Status, :login, :pwd)");

$r->bindParam(":Nom",$nom);
$r->bindParam(":prenom",$prenom);
$r->bindParam(":IDM",$ID);
$r->bindParam(":Status",$Status);
$r->bindParam(":login",$Login);
$r->bindParam(":pwd",$pwd);

$r->execute();

header("location: ../vue/Nouveau_employer.php")
?>
