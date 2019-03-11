<?php $title = "Liste des employer"; ?>
<?php include_once'header.php'?>
<h1>Liste des employers</h1>
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
        <tbody>

<table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Employer</th>
      <th scope="col">Profession</th>
      <th scope="col">Contrat</th>
      <th scope="col">Bijoux en cours</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>Otto</td>
      <td>Otto</td>
      <td>Otto</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>Thornton</td>
      <td>Thornton</td>
      <td>Thornton</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>the Bird</td>
      <td>the Bird</td>
      <td>the Bird</td>
    </tr>
  </tbody>
</table>
<a href="Nouveau_employer.php" class="btn btn-secondary btn-lg" role="button" aria-pressed="true">Nouveau</a>
<?php include_once'footer.php'?>