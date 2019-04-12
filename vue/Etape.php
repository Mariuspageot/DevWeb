<?php
require_once '../Config.php';
$id=filter_input(INPUT_GET, "id");


$db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME , Config::USER , Config::PASSWORD);

$r = $db->prepare("select NomB from bijoux where ID=:id");
$r->bindParam(":id",$id);
$r->execute();

$rr = $db->prepare("select etapes.ID, IDMetierSuivant, NomE, NomMetier from etapes join employees on etapes.IDE=employees.ID join metier on IDMetier=metier.ID where etapes.IDB=:id");
$rr->bindParam(":id",$id);
$rr->execute();


$Bijou=$r->fetch();

$etapes=$rr->fetchAll();
?>
<?php $title = "Etapes"; ?>
<?php include_once'./header.php'?>

    <h1>Etapes</h1>
    <table class="table table-hover">
        <thead class="thead-dark">
        <th>Nom du Bijou: <?php echo $Bijou["NomB"]; ?></th>
        </thead>
        <tbody>

        <table class="table table-hover ">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Employé</th>
                <th scope="col">Tâche</th>
                <th scope="col">Tâche suivante</th>

            </tr>
            </thead>
            <?php
            foreach ($etapes as  $etape) {
                ?>
                <tr onclick="location.href='DetailEtape.php?ide=<?php echo $etape["ID"]; ?>?id=<?php echo $id; ?>'">
                    <td><?php echo $etape["NomE"]; ?></td>
                    <td><?php echo $etape["NomMetier"]; ?></td>
                    <td><?php echo $etape["IDMetierSuivant"]; ?></td>
                </tr>

                <?php
            }
            ?>

        </table>
        </tbody>
    </table>
    <a href="Bijoux.php" class="btn btn-secondary btn-lg" role="button" aria-pressed="true">Retour</a>
<?php include_once'./footer.php'?>