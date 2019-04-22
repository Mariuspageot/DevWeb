<?php
/**
 * Created by PhpStorm.
 * User: Marius PAGEOT
 * Date: 11/03/2019
 * Time: 15:57
 */
require_once '../Config.php';

$idb= filter_input(INPUT_GET, "idb");
$nom= filter_input(INPUT_POST, "Nom");
$prix=filter_input (INPUT_POST,"Prix");
$tache=filter_input (INPUT_POST,"Tache");
$temps=filter_input (INPUT_POST,"Temps");
$ClientNom=filter_input (INPUT_POST,"Client");
$db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME , Config::USER , Config::PASSWORD);

$rr = $db->prepare("select ID, NomC from clients");
$rr->execute();
$rrr = $db->prepare("select ID, NomMetier from metier");
$rrr->execute();

$IDMs=$rrr->fetchAll();
$Clients = $rr->fetchAll();

foreach ($Clients as $client){
    if($client["NomC"] == $ClientNom ){
        $IDC = $client["ID"];
    }
}

foreach ($IDMs as $IDM){
    if ($IDM["NomMetier"] == $tache){
        $IDMM = $IDM["ID"];
    }
}

$r = $db->prepare("update bijoux set NomB=:Nom, Prix=:prix, tache=:tache, Temps=:Temps, IDC=:IDC where ID=:idb");

$r->bindParam(":Nom",$nom);
$r->bindParam(":prix",$prix);
$r->bindParam(":tache",$IDMM);
$r->bindParam(":Temps",$temps);
$r->bindParam(":IDC",$IDC);
$r->bindParam(":idb",$idb);


$r->execute();

header("location: ../vue/Bijoux.php");

?>