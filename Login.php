<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>CHIMERE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="Maquette_CSS.css">
</head>
<body>
  <div class="d-flex justify-content-center align-items-center container">
  <div class="card mb-3" style="width: 18rem;">
  <img src="logo-chimere.svg"  class="rounded mx-auto d-block" height="250vh">
  <div class="card-body">
    <form>
      <div class="form-group">
        <label for="login">Nom d'utilisateur</label>
        <input type="text" class="form-control" id="login" aria-describedby="login" placeholder="Nom d'utilisateur">
        <small id="login" class="form-text text-muted"></small>
      </div>
      <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" id="password" placeholder="Mot de passe">
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
</div>
  
</body>
  </html>