<?php $title = "Liste des bijoux"; ?>
<?php include_once'./header.php'?>

<?php

require_once '../Config.php';
$db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME , Config::USER , Config::PASSWORD);

$r = $db->prepare("select ID, NomB, Prix, Temps from bijoux order by ID desc");
$r -> execute();

$bijoux=$r->fetchAll();
?>
    <h1>Bijoux</h1>
    <table>
        <thead>
        <th>Nom: <?php echo $_SESSION["NomE"] ?></th>
        </thead>
        <thead>
        <th>Prénom: <?php echo $_SESSION["PrenomE"] ?></th>
        </thead>
        <thead>
        <th>Metier: <?php echo $_SESSION["Metier"] ?></th>
        </thead>
        <tbody>
            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Date de fin</th>
                </tr>
                </thead>
            <?php
            foreach ($bijoux as  $bijou) {
                ?>
                <tr onclick="location.href='Etape.php?idb=<?php echo $bijou["ID"]; ?>'">
                    <td><?php echo $bijou["ID"]; ?></td>
                    <td><?php echo $bijou["NomB"]; ?></td>
                    <td><?php echo $bijou["Prix"]; echo "€"?></td>
                    <td><?php echo $bijou["Temps"]; ?></td>
                </tr>

                <?php
            }
            ?>
            </table>
        </tbody>
    </table>
    <a href="Nouveau_bijou.php" class="btn btn-secondary btn-lg" role="button" aria-pressed="true">Nouveau</a>
<?php include_once'footer.php'?>
