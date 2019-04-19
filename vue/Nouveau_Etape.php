<?php
require_once '../Config.php';
$idb=filter_input(INPUT_GET, "idb");

$db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME , Config::USER , Config::PASSWORD);

$r = $db->prepare("select NomMateriaux from materiaux");
$r -> execute();

$rr = $db->prepare("select NomPierre from typepierres");
$rr -> execute();

$rrr = $db->prepare("select NomMetier from metier");
$rrr -> execute();

$Materiaux=$r->fetchAll();
$Pierres=$rr->fetchAll();
$Metiers=$rrr->fetchAll();
?>

<?php $title = "Nouvelle etape"; ?>
<?php include_once'header.php'?>
    <table class="table table-hover">
    <thead class="thead-dark">
    <th>Employer: <?php echo $_SESSION["NomE"]; ?> <?php echo $_SESSION["PrenomE"]; ?></th>
    <th>Métier: <?php echo $_SESSION["Metier"]; ?></th>
    </thead>
    </table>
<form action="../action/AjouterEtape.php" method="post">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="Temps">Temps de l'étape</label>
            <input type="time" class="form-control" id="Temps" name="Temps" >
        </div>
    </div>
  <div class="form-row">
      <div class="form-group col-md-4">
      <label for="Materiaux">Matériaux</label>
      <select class="form-control" id="Materiaux" name="Materiaux">
          <option selected>Choose...</option>
          <?php
          foreach ($Materiaux as $Matiere) {
              ?>
              <option><?php echo $Matiere["NomMateriaux"] ?></option>
              <?php
          }
          ?>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="Quantiter">Quantiter</label>
      <input type="text" class="form-control" id="Quantiter" name="Quantiter" placeholder=" 100g">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="Pierre">Pierre</label>
      <select id="Pierre" name="Pierre" class="form-control">
        <option selected>Choose...</option>
          <?php
          foreach ($Pierres as $pierre) {
              ?>
              <option><?php echo $pierre["NomPierre"] ?></option>
              <?php
          }
          ?>
      </select>
    </div>
      <div class="form-group col-md-4">
          <label for="Nombre">Nombre</label>
          <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre">
      </div>
  </div>
    <div class="form-row">
        <div class="form-group col-md-4"
        <label for="metierSuivant">Metier suivant</label>
        <select id="metierSuivant" name="metierSuivant" class="form-control">
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
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="Description">Description</label>
            <textarea  class="form-control" id="Description" name="Description" rows="3" ></textarea>
        </div>
    </div>
  <button type="submit" class="btn btn-secondary btn-lg">Ajouter</button>
<a href="Etape.php?idb=<?php echo $idb; ?>" class="btn btn-secondary btn-lg" role="button" aria-pressed="true">Retour</a>
</form>



<?php include_once'footer.php'?>