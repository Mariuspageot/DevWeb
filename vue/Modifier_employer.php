<?php $title = "Modification d'un employer"; ?>
<?php include_once'header.php'?>
<?php
require_once '../Config.php';
$ide=filter_input(INPUT_GET,"ide");
$db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME , Config::USER , Config::PASSWORD);

$rr = $db->prepare("select ID, NomE, PrenomE, IDMetier, Status, Login, Password from employees where ID=:ide");
$rr->bindParam(":ide",$ide);
$rr->execute();
$employee = $rr->fetch();

$r = $db->prepare("select NomMetier from metier");
$r -> execute();
$Metiers=$r->fetchAll();
?>

<form action="../action/ModifierEmploye.php?ide=<?php echo $ide ?>" method="post">
  <div class="form-row">
        <div class="form-group col-md-6">
            <label for="Nom">Nom</label>
            <input type="text" class="form-control" id="Nom" name="Nom" value="<?php echo $employee["NomE"]?>" >
        </div>
        <div class="form-group col-md-6">
            <label for="Prenom">Prénom</label>
            <input type="text" class="form-control" id="Prenom" name="Prenom" value="<?php echo $employee["PrenomE"]?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="Login">Nom de connexion</label>
            <input type="text" class="form-control" id="Login" name="Login" value="<?php echo $employee["Login"]?>">
        </div>
        <div class="form-group col-md-6">
            <label for="pwd">Mot de passe</label>
            <input type="password" class="form-control" id="pwd" name="pwd" value="<?php echo $employee["Password"]?>">
        </div>
    </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="NomMetier">Profession</label>
      <select id="NomMetier" name="NomMetier" class="form-control">
          <?php
          foreach ($Metiers as $metier) {
              if ($metier["ID"]==$employee["IDMetier"]) {

                  ?>
                  <option selected><?php echo $metier["NomMetier"] ?></option>
                  <?php
              }
          }
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
        <option selected><?php echo $employee["Status"]?></option>
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