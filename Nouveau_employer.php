<?php $title = "Nouveau employer"; ?>
<?php include_once'header.php'?>
<form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nom">Nom</label>
      <input type="text" class="form-control" id="nom" placeholder="Nom de l'employer">
    </div>
    <div class="form-group col-md-6">
      <label for="prénom">Prénom</label>
      <input type="text" class="form-control" id="prénom" placeholder="Prénom de l'employer">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputState">Profession</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>Fondeur/Mouleur</option>
        <option>Polisseur</option>
        <option>Tailleur</option>
        <option>Sertisseur</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Grade</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>Employer</option>
        <option>Chef</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Statue</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>Actif</option>
        <option>Licencier</option>
        <option>Arrêt</option>
        <option>Vacances</option>
      </select>
  </div>
  </div>
  <div class="form-group">
  </div>
    <button type="submit" class="btn btn-secondary btn-lg">Ajouter</button>
    <a href="Employers.php" class="btn btn-secondary btn-lg" role="button" aria-pressed="true">Retour</a>
</form>



<?php include_once'footer.php'?>