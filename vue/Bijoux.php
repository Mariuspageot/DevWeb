<?php $title = "Liste des bijoux"; ?>
<?php include_once'./header.php'?>

<?php
require_once '../Config.php';
$db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME , Config::USER , Config::PASSWORD);

$r = $db->prepare("select ID, NomB, Prix, IDC from bijoux");

$r -> execute();

$bijoux=$r->fetchAll();
?>
    <h1>Liste des bijoux</h1>
    <table>
        <thead>
        <th>Nom:</th>
        </thead>
        <thead>
        <th>Prénom:</th>
        </thead>
        <thead>
        <th>Grade:</th>
        </thead>
        <tbody>
            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Client</th>
                    <th scope="col"></th>
                </tr>
                </thead>
            <?php
            foreach ($bijoux as  $bijou) {
                ?>
                <tr>
                    <td><?php echo $bijou["ID"]; ?></td>
                    <td><?php echo $bijou["NomB"]; ?></td>
                    <td><?php echo $bijou["Prix"]; echo "€"?></td>
                    <td><?php echo $bijou["IDC"]; ?></td>
                    <td><a href="Detail_bijou.php?ID=<?php echo $bijou["ID"]?>" class="btn btn-dark">VOIR</a></td>
                </tr>

                <?php
            }
            ?>
            </table>
        </tbody>
    </table>
    <a href="Nouveau_bijou.php" class="btn btn-secondary btn-lg" role="button" aria-pressed="true">Nouveau</a>
<?php include_once'footer.php'?>
