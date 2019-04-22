<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Marius PAGEOT
 * Date: 11/03/2019
 * Time: 15:57
 */
require_once '../Config.php';
$idb=filter_input(INPUT_GET,"idb");
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

$couut = $db->prepare("select ID, CoutTotal from bijoux where bijoux.ID=:idb");
$couut->bindParam(":idb",$idb);
$couut->execute();
$coutTotal = $couut->fetch();

$CoutTotal = $coutTotal["CoutTotal"] + ($cout * $nombreDePierre);

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
    if ($IDP["NomPierre"]==$typeDePierre){
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

$etapeID = $db->prepare("select ID from etapes");
$etapeID->execute();
$etapeID->fetchAll();
$IDET = $etapeID->rowCount();

$rr = $db->prepare("insert into nombretypepierres(IDP, IDET, nombreDePierre, couts)"."values(:IDP, :IDET, :nombre, :couts)");
$rr->bindParam(":IDP", $IDPI);
$rr->bindParam(":IDET", $IDET);
$rr->bindParam(":nombre", $nombreDePierre);
$rr->bindParam(":couts", $cout);

$rr->execute();

$rrr = $db->prepare("insert into quantite(idmateriau, idet, quantiter)"."values(:IDMA, :IDET, :quantiter)");
$rrr->bindParam(":IDMA", $IDA);
$rrr->bindParam(":IDET", $IDET);
$rrr->bindParam(":quantiter", $quantiter);

$rrr->execute();

$up = $db->prepare("update bijoux set CoutTotal=:coutTotal where ID=:idb");
$up->bindParam(":coutTotal", $CoutTotal);
$up->bindParam(":idb", $idb);
$up->execute();
header("location: ../vue/Nouveau_Etape.php?idb=$idb")
?>
