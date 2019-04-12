<?php
require_once '../Config.php';
$ide=filter_input(INPUT_GET, "ide");
$idb=filter_input(INPUT_GET, "idb");


$db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME , Config::USER , Config::PASSWORD);

$r = $db->prepare("select NomB, ID from bijoux where ID=:idb");
$r->bindParam(":idb",$idb);
$r->execute();

$rr = $db->prepare("select etapes.IDB, etapes.ID, NomE from etapes join employees on etapes.IDE=employees.ID where etapes.IDB=:idb");
$rr->bindParam(":idb",$idb);
$rr->execute();


$Bijou=$r->fetch();

$etapes=$rr->fetchAll();
?>
<?php $title = "Detail du bijou"; ?>
<?php include_once'./header.php'?>

<h1>Détail du bijou</h1>
    <table class="table table-hover">
        <thead class="thead-dark">
          <th>Nom du Bijou: <?php echo $Bijou["NomB"]; ?></th>
          <th>ID de l'étape: <?php echo $ide; ?></th>
        </thead>
        <tbody>

            <table class="table table-hover ">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Employé</th>
                    </tr>
                </thead>
                <?php
                foreach ($etapes as  $etape) {
                ?>
                <tr>
                    <td><?php echo $etape["ID"]; ?></td>
                    <td><?php echo $etape["NomE"]; ?></td>
                </tr>

                <?php
                }
                ?>

            </table>
        </tbody>
</table>
<a href="Etape.php?idb=<?php echo $idb; ?>" class="btn btn-secondary btn-lg" role="button" aria-pressed="true">Retour</a>
<?php include_once'./footer.php'?>