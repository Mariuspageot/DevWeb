<?php $title = "Nouveau bijou"; ?>
<?php include_once'header.php'?>
<form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nom">Nom</label>
      <input type="text" class="form-control" id="nom" placeholder="Nom du client">
    </div>
    <div class="form-group col-md-6">
      <label for="prénom">Prénom</label>
      <input type="text" class="form-control" id="prénom" placeholder="Prénom du client">
    </div>
  </div>
  <div class="form-group">
    <label for="nomBijou">Nom du bijou</label>
    <input type="text" class="form-control" id="nomBijou" placeholder="Nom du bijou">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" id="description" placeholder="Demande du client">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="temps">Temps estimé</label>
      <input type="text" class="form-control" id="temps" placeholder="Temps prévue">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputState">Première tache</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>Fondeur/Mouleur</option>
        <option>Polisseur</option>
        <option>Tailleur</option>
        <option>Sertisseur</option>
      </select>
    </div>
  </div>
  <button type="submit" class="btn btn-secondary btn-lg">Ajouter</button>
<a href="Bijoux.php" class="btn btn-secondary btn-lg" role="button" aria-pressed="true">Retour</a>
</form>



<?php include_once'footer.php'?>