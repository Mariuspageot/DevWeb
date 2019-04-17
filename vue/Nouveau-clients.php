<?php
require_once '../Config.php';
$db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME , Config::USER , Config::PASSWORD);

$r = $db->prepare('INSERT INTO clients(ID, NomC )');
$r -> execute();
$clients=$r->fetchAll();
?>

<?php $title = "Nouveau clients"; ?>
<?php include_once'header.php'?>
<form action="../action/AjouterClients.php" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="Nom">Nom</label>
      <input type="text" class="form-control" id="Nom" name="Nom" placeholder="Nom du clients">
    </div>
  </div>

      <button type="submit" class="btn btn-secondary btn-lg">Ajouter</button>
      <a href="Liste-clients.php" class="btn btn-secondary btn-lg" role="button" aria-pressed="true">Retour</a>

</form>


<?php include_once'footer.php'?>