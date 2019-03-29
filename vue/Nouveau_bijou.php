<?php $title = "Nouveau bijou"; ?>
<?php include_once'header.php'?>
<form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nom">Nom</label>
      <input type="text" class="form-control" id="nom" placeholder="Nom du client">
    </div>
    <div class="form-group col-md-6">
      <label for="prénom">prix</label>
      <input type="text" class="form-control" id="prix" placeholder="prix">
    </div>
  </div>
  <div class="form-group">
    <label for="nomBijou">premiere tache</label>
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