<?php
require_once '../Config.php';
$id=filter_input(INPUT_GET, "ID");


$db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME , Config::USER , Config::PASSWORD);

$r = $db->prepare("select Nom from bijoux where ID=:id");


$r->bindParam(":id",$id);
$r->execute();

$rr = $db->prepare("select etapes.ID, bijoux.Nom, employees.nom from etapes join employees on etapes.IDE=employees.ID join bijoux on etapes.IDB=bijoux.ID where etapes.IDB=:id");
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
          <th>Nom du Bijou: <?php echo $Bijou["Nom"]; ?></th>
        </thead>
        <tbody>

            <table class="table table-hover ">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Employé</th>
                    </tr>
                </thead>
                <?php
                foreach ($etapes as  $etape) {
                ?>
                <tr>
                    <td><?php echo $etape["ID"]; ?></td>
                    <td><?php echo $etape["Nom"]; ?></td>
                    <td><?php echo $etape["nom"]; ?></td>
                </tr>

                <?php
                }
                ?>

            </table>
        </tbody>
</table>
<a href="Bijoux.php" class="btn btn-secondary btn-lg" role="button" aria-pressed="true">Retour</a>
<?php include_once'./footer.php'?>