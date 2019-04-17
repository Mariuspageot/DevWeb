<?php $title = "Liste-clients"; ?>
<?php include_once'./header.php'?>
<?php
require_once '../Config.php';
$db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME , Config::USER , Config::PASSWORD);

$r = $db->prepare("select  ID, NomC from clients ");

$r -> execute();

$clients=$r->fetchAll();
?>
<h1>Liste des clients</h1>

    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
        </tr>
        </thead>
        <?php
        foreach ($clients as  $client) {
            ?>
            <tr>
                <td><?php echo $client["ID"]; ?></td>
                <td><?php echo $client["NomC"]; ?></td>

            </tr>

            <?php
        }
        ?>
        </tbody>
    </table>
</table>

<a href="Nouveau-clients.php" class="btn btn-secondary btn-lg" role="button" aria-pressed="true">Nouveau</a>
<?php include_once'footer.php'?>




