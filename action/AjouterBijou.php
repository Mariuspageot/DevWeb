<?php
/**
 * Created by PhpStorm.
 * User: Marius PAGEOT
 * Date: 11/03/2019
 * Time: 15:57
 */
require_once '../Config.php';
$nom= filter_input(INPUT_POST, "Nom");
$prix=filter_input (INPUT_POST,"Prix");
$premiere_tache=filter_input (INPUT_POST,"Premiere tache");
$IDET=filter_input (INPUT_POST,"IDET");
$temps=filter_input (INPUT_POST,"temps estime");
$IDC=filter_input (INPUT_POST,"IDC");
$db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME , Config::USER , Config::PASSWORD);
$r = $db->prepare("insert into bijoux (nom,prix,premiere tache,IDET,Temps estime,IDC)"." values (:Nom, :prix, :premiere tache, :Temps estime,:IDC,:IDET)");

$r->bindParam(":Nom",$nom);
$r->bindParam(":prix",$prix);
$r->bindParam(":premiere tache",$premiere_tache);
$r->bindParam(":Temps estime",$temps);
$r->bindParam(":IDC",$IDC);
$r->bindParam(":IDET",$IDET);

$r->execute();

header("location: ../voir_categorie.php?id=$idcategorie");

?>