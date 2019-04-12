<?php
require_once '../Config.php';
$id=filter_input(INPUT_GET, "id");
$ide=filter_input(INPUT_GET, "ide");


$db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME , Config::USER , Config::PASSWORD);

$r = $db->prepare("select NomB from bijoux where ID=:id");
$r->bindParam(":id",$id);
$r->execute();

$rr = $db->prepare("select etapes.ID, NomE from etapes join employees on etapes.IDE=employees.ID where etapes.IDB=:id");
$rr->bindParam(":id",$id);
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
<a href="Etape.php?id=<?php echo $id; ?>?ide=<?php echo $ide; ?>" class="btn btn-secondary btn-lg" role="button" aria-pressed="true">Retour</a>
<?php include_once'./footer.php'?>