<?php
require_once '../Config.php';
$db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME , Config::USER , Config::PASSWORD);

$r = $db->prepare("select NomMetier from metier");
$r -> execute();
$Metiers=$r->fetchAll();
?>

<?php $title = "Nouveau employer"; ?>
<?php include_once'header.php'?>
<form action="../action/AjouterEmploye.php" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="Nom">Nom</label>
      <input type="text" class="form-control" id="Nom" name="Nom" placeholder="Nom de l'employer">
    </div>
    <div class="form-group col-md-6">
      <label for="Prenom">Prénom</label>
      <input type="text" class="form-control" id="Prenom" name="Prenom" placeholder="Prénom de l'employer">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="NomMetier">Profession</label>
      <select id="NomMetier" name="NomMetier" class="form-control">
        <option selected>Choose...</option>
          <?php
          foreach ($Metiers as $metier) {
              ?>
              <option><?php echo $metier["NomMetier"] ?></option>
              <?php
          }
              ?>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="Status">Status</label>
      <select id="Status" name="Status" class="form-control">
        <option selected>Choose...</option>
        <option><?php echo "Actif"?></option>
        <option><?php echo "Licencier"?></option>
        <option><?php echo "Arrêt"?></option>
        <option><?php echo "Vacances"?></option>
      </select>
  </div>
  </div>
  <div class="form-group">
  </div>
    <button type="submit" class="btn btn-secondary btn-lg">Ajouter</button>
    <a href="Employers.php" class="btn btn-secondary btn-lg" role="button" aria-pressed="true">Retour</a>
</form>



<?php include_once'footer.php'?>