<?php $title = "Modification du bijou"; ?>
<?php include_once'header.php'?>
<?php
require_once '../Config.php';
$idb=filter_input(INPUT_GET, "idb");
$db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME , Config::USER , Config::PASSWORD);

$rrr = $db->prepare("select ID, NomB, Prix, tache, Temps, IDC from bijoux where bijoux.ID = :idb");
$rrr->bindParam(":idb", $idb);
$rrr->execute();
if ($rrr->rowCount()==0) {
    http_response_code("404");
    echo "cette page n'existe pas...";
    die();
}
$r = $db->prepare("select NomMetier, ID from metier");
$r -> execute();

$rr = $db->prepare("select NomC, ID from clients");
$rr -> execute();

$bijou=$rrr->fetch();

$Metiers=$r->fetchAll();
$Clients=$rr->fetchAll();

?>


<form action="../action/ModifierBijou.php?idb=<?php echo $bijou["ID"]?>" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="Nom">Nom</label>
      <input type="text" class="form-control" id="Nom"  name="Nom" value="<?php echo htmlspecialchars($bijou["NomB"])?>">
    </div>
    <div class="form-group col-md-6">
      <label for="Prix">Prix</label>
      <input type="text" class="form-control" id="Prix" name="Prix" value="<?php echo $bijou["Prix"]?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="Temps">Temps estimé</label>
      <input type="date" class="form-control" id="Temps" name="Temps" value="<?php echo $bijou["Temps"]?>">
    </div>
  </div>
    <div class="form-group">
        <label for="Client">Client</label>
        <select class="form-control" id="Client" name="Client">
           <?php foreach ($Clients as $client){
                if ($client["ID"] == $bijou["IDC"]){ ?>
                    <option selected><?php echo $client["NomC"] ?></option>
                    <?php
                }
            }
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
          <?php foreach ($Metiers as $metier){
          if ($metier["ID"] == $bijou["tache"]){ ?>
          <option selected><?php echo $metier["NomMetier"] ?></option>
          <?php
                }
            }
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