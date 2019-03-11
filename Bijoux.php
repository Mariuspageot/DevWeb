<?php $title = "Liste des bijoux"; ?>
<?php include_once'./header.php'?>
    <h1>Liste des bijoux</h1>
    <table>
        <thead>
          <th>Nom:</th>
        </thead>
        <thead>
          <th>Prénom:</th>
        </thead>
        <thead>
          <th>Grade:</th>
        </thead>
</table>
    <table class="table table-hover">
  <thead class="thead-dark">
  <tr>
      <th scope="col">#</th>
      <th scope="col">Bijou</th>
      <th scope="col">Cient</th>
      <th scope="col">Tache actuel</th>
    </tr>
  </thead>
  <tbody>
    <tr onclick="location.href='Detail_bijou.php'">
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
    <a href="Nouveau_bijou.php" class="btn btn-secondary btn-lg" role="button" aria-pressed="true">Nouveau</a>
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-dark" type="submit">Search</button>
    </form>
<?php include_once'./footer.php'?>