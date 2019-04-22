<nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
        <form action="logout">
            <a class="navbar-brand" href="#"><img src="../logo-chimere.svg" height="40px"></a>
        </form>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="Bijoux.php">Liste des bijoux</a>
            </li>
              <?php if ($_SESSION["IDMetier"] == "5"){ ?>
            <li class="nav-item">
              <a class="nav-link" href="Employers.php">Employers</a>
            </li>
              <li class="nav-item">
                  <a class="nav-link" href="Liste-clients.php">Clients</a>
              </li>
                <?php }?>
          </ul>
            <ul class="nav navbar-nav navbar-right">
            <li class="nav-item">
              <a class="nav-link" href="../action/logout.php" >Déconnexion</a>
            </li>

          </ul>
        </div>
</nav>