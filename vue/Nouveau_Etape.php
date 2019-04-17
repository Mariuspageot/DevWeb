<?php
require_once '../Config.php';
$idb=filter_input(INPUT_GET, "idb");

$db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME , Config::USER , Config::PASSWORD);

$r = $db->prepare("select NomMetier, ID from metier");
$r -> execute();

$rr = $db->prepare("select NomC from clients");
$rr -> execute();

$Metiers=$r->fetchAll();
$Clients=$rr->fetchAll();
?>

<?php $title = "Nouvelle etape"; ?>
<?php include_once'header.php'?>
<form action="../action/AjouterEtape.php" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="Nom">Nom</label>
      <input type="text" class="form-control" id="Nom"  name="Nom" placeholder="Nom du bijou">
    </div>
    <div class="form-group col-md-6">
      <label for="Prix">Prix</label>
      <input type="text" class="form-control" id="Prix" name="Prix" placeholder="prix">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="Temps">Temps estimé</label>
      <input type="date" class="form-control" id="Temps" name="Temps" placeholder="Temps prévue">
    </div>
  </div>
    <div class="form-group">
        <label for="Client">Client</label>
        <select class="form-control" id="Client" name="Client">
            <?php
            foreach ($Clients as $client) {
                ?>
                <option><?php echo $client["NomC"] ?></option>
                <?php
            }
            ?>
        </select>
    </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="Tache">Première tache</label>
      <select id="Tache" name="Tache" class="form-control">
        <option selected>Choose...</option>
          <?php
          foreach ($Metiers as $metier) {
             if($metier["ID"]!= 5) { ?>
                 <option><?php echo $metier["NomMetier"] ?></option>
                 <?php
             }
          }
          ?>
      </select>
    </div>
  </div>
  <button type="submit" class="btn btn-secondary btn-lg">Ajouter</button>
<a href="Etape.php?idb=<?php echo $idb; ?>" class="btn btn-secondary btn-lg" role="button" aria-pressed="true">Retour</a>
</form>



<?php include_once'footer.php'?>