<?php $title = "Liste des employer"; ?>
<?php include_once'header.php'?>

<?php
require_once '../Config.php';
$db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME , Config::USER , Config::PASSWORD);

$r = $db->prepare("select employees.ID, NomE, PrenomE, metier.NomMetier, Status from employees join metier on employees.IDMetier=metier.ID");

$r -> execute();

$employees=$r->fetchAll();
?>
    <h1>Employers</h1>
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
            <th scope="col">Prénom</th>

            <th scope="col">Métier</th>
            <th scope="col">Status</th>
            <th scope="col">Modifier</th>

        </tr>
        </thead>
        <?php
        foreach ($employees as  $employee) {
            ?>
            <tr>
                <td><?php echo $employee["ID"]; ?></td>
                <td><?php echo $employee["NomE"]; ?></td>
                <td><?php echo $employee["PrenomE"]; ?></td>
                <td><?php echo $employee["NomMetier"]; ?></td>
                <td><?php echo $employee["Status"]; ?></td>
                <td><a href="Modifier_employer.php?ide=<?php echo $employee["ID"]?>" class="btn btn-secondary" role="button" aria-pressed="true">Modifier</a></td>
            </tr>

            <?php
        }
        ?>
        </tbody>
    </table>
    </table>

<a href="Nouveau_employer.php" class="btn btn-secondary btn-lg" role="button" aria-pressed="true">Nouveau</a>
<?php include_once'footer.php'?>