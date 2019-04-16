<?php
require_once '../Config.php';
$db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME , Config::USER , Config::PASSWORD);

$r = $db->prepare("select NomMetier, ID from metier");
$r -> execute();

$rr = $db->prepare("select NomC from clients");
$rr -> execute();

$Metiers=$r->fetchAll();
$Clients=$rr->fetchAll();
?>

<?php $title = "Nouveau bijou"; ?>
<?php include_once'header.php'?>
<form action="../action/AjouterBijou.php" method="post">
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
      <input type="time" class="form-control" id="Temps" name="Temps" placeholder="Temps prévue">
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
<a href="Bijoux.php" class="btn btn-secondary btn-lg" role="button" aria-pressed="true">Retour</a>
</form>



<?php include_once'footer.php'?>