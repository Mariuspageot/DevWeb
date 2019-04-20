<?php
require_once '../Config.php';
$ide=filter_input(INPUT_GET, "ide");



$db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME , Config::USER , Config::PASSWORD);

$r = $db->prepare("select NomMetier as NomMetierS from etapes join metier on etapes.IDMetierSuivant=metier.ID where etapes.ID=:ide");
$r->bindParam(":ide",$ide);
$r->execute();

$rr = $db->prepare("select etapes.IDB, employees.PrenomE, etapes.Description, etapes.IDMetierSuivant, etapes.controleDeQualite, etapes.Temps, metier.NomMetier, bijoux.NomB, etapes.ID, employees.IDMetier, NomE from etapes join employees on etapes.IDE=employees.ID join bijoux on etapes.IDB=bijoux.ID join metier on employees.IDMetier=metier.ID where etapes.ID=:ide");
$rr->bindParam(":ide",$ide);
$rr->execute();

$rrr = $db->prepare("select etapes.ID, quantiter, nombreDePierre, NomMateriaux, couts, NomPierre from etapes join quantite on quantite.IDET=etapes.ID join materiaux on materiaux.ID=quantite.IDMateriau join nombretypepierres on nombretypepierres.IDET=etapes.ID join typepierres on typepierres.ID=IDP where etapes.ID=:ide");
$rrr->bindParam(":ide",$ide);
$rrr->execute();

$suiv=$r->fetch();
$etape=$rr->fetch();
$matiere=$rrr->fetch();
?>
<?php $title = "Detail du bijou"; ?>
<?php include_once'./header.php'?>

<h1>Détail du bijou</h1>
    <table class="table table-hover">
        <thead class="thead-dark">
          <th>Nom du Bijou: <?php echo $etape["NomB"]; ?></th>
        </thead>
        <tbody>

        <table class="table table-hover table-dark">
            <tbody>        <tr>
                <th>Employer</th>
                <th><?php echo $etape["NomE"] ?> <?php echo $etape["PrenomE"] ?></th>
            </tr>
            <tr>
                <th>Tache attribuer</th>
                <th><?php echo $etape["NomMetier"] ?></th>
            </tr>
            <tr>
                <th>Etat</th>
                <th><?php if($etape["controleDeQualite"]==1){
                    echo "valide";
                    }else{
                    echo "invalide";
                    } ?></th>
            </tr>
            <tr>
                <th>Temps</th>
                <th><?php echo $etape["Temps"] ?></th>
            </tr>
            <tr>
                <th>Prochain métier</th>
                <th><?php echo $suiv["NomMetierS"] ?></th>
            </tr>
            <tr>
                <th>Matériaux</th>
                <th><?php echo $matiere["NomMateriaux"] ?></th>
            </tr>
            <tr>
                <th>Quantiter</th>
                <th><?php echo $matiere["quantiter"] ?> g</th>
            </tr>
            <tr>
                <th>Pierre</th>
                <th><?php echo $matiere["NomPierre"] ?></th>
            </tr>
            <tr>
                <th>Nombre de pierre</th>
                <th><?php echo $matiere["nombreDePierre"] ?></th>
            </tr>
            <tr>
                <th>Prix total</th>
                <th><?php $cout = $matiere["couts"] * $matiere["nombreDePierre"];
                        echo $cout?> €</th>
            </tr>
            <tr>
                <th>Description</th>
                <th><?php echo $etape["Description"] ?></th>
            </tr>

            </tbody>
        </table>
        </tbody>
</table>
<a href="Etape.php?idb=<?php echo $etape["IDB"]; ?>" class="btn btn-secondary btn-lg" role="button" aria-pressed="true">Retour</a>
<?php include_once'./footer.php'?>