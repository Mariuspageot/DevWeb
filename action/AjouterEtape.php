<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Marius PAGEOT
 * Date: 11/03/2019
 * Time: 15:57
 */
require_once '../Config.php';
$idb= filter_input(INPUT_GET, "idb");
$time= filter_input(INPUT_POST, "Temps");
$validation= filter_input(INPUT_POST, "Validation");
$matiere=filter_input (INPUT_POST,"Materiaux");
$quantiter=filter_input (INPUT_POST,"Quantiter");
$typeDePierre=filter_input (INPUT_POST,"Pierre");
$nombreDePierre=filter_input (INPUT_POST,"Nombre");
$cout=filter_input (INPUT_POST,"Cout");
$metierSuiv=filter_input (INPUT_POST,"metierSuivant");
$description=filter_input (INPUT_POST,"Description");
$db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME , Config::USER , Config::PASSWORD);

$metier = $db->prepare("select ID, NomMetier from metier");
$metier->execute();

$IDMs=$metier->fetchAll();

foreach ($IDMs as $IDM){
    if ($IDM["NomMetier"]==$metierSuiv){
        $ID = $IDM["ID"];
    }
}
$materiaux = $db->prepare("select ID, NomMateriaux from materiaux");
$materiaux->execute();

$IDMAs=$materiaux->fetchAll();

foreach ($IDMAs as $IDMA){
    if ($IDMA["NomMateriaux"]==$matiere){
        $IDA = $IDMA["ID"];
    }
}
$pierres = $db->prepare("select ID, NomPierre from typepierres");
$pierres->execute();

$IDPs=$pierres->fetchAll();

foreach ($IDPs as $IDP){
    if ($IDP["NomMetier"]==$typeDePierre){
        $IDPI = $IDP["ID"];
    }
}

if ($validation == "Invalide"){
    $Valide = "0";
}else{
    $Valide = "1";
}



$r = $db->prepare("insert into etapes (IDE, IDMetierSuivant, IDB, controleDeQualite, Description, Temps )"." values ( :IDE, :IDMetierSuivant, :IDB, :controleDeQualite, :Description, :Temps)");

$r->bindParam(":IDE",$_SESSION["IDE"]);
$r->bindParam(":IDMetierSuivant",$ID);
$r->bindParam(":IDB",$idb);
$r->bindParam(":controleDeQualite",$Valide);
$r->bindParam(":Description",$description);
$r->bindParam(":Temps",$time);

$r->execute();

header("location: ../vue/Nouveau_Etape.php")
?>
