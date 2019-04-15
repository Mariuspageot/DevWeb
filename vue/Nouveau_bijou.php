<?php
require_once '../Config.php';
$db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME , Config::USER , Config::PASSWORD);

$r = $db->prepare("select NomMetier from metier");
$r -> execute();
$Metiers=$r->fetchAll();
?>

<?php $title = "Nouveau bijou"; ?>
<?php include_once'header.php'?>
<form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nom">Nom</label>
      <input type="text" class="form-control" id="nom" placeholder="Nom du bijou">
    </div>
    <div class="form-group col-md-6">
      <label for="prix">prix</label>
      <input type="text" class="form-control" id="prix" placeholder="prix">
    </div>
  </div>
  <div class="form-group">
    <label for="premiere_tache">premiere tache</label>
    <input type="text" class="form-control" id="premiere_tache" placeholder="premiere tache">
  </div>
  <div class="form-group">
    <label for="description">IDET</label>
    <input type="text" class="form-control" id="IDET" placeholder="etape">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="temps">Temps estimé</label>
      <input type="text" class="form-control" id="temps" placeholder="Temps prévue">
    </div>
  </div>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="temps">IDC</label>
      <input type="text" class="form-control" id="IDC" placeholder="Client">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputState">Première tache</label>
      <select id="inputState" class="form-control">
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
  </div>
  <button type="submit" class="btn btn-secondary btn-lg">Ajouter</button>
<a href="Bijoux.php" class="btn btn-secondary btn-lg" role="button" aria-pressed="true">Retour</a>
</form>



<?php include_once'footer.php'?>