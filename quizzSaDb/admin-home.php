<!doctype html>
<html lang="en">
  <head>
    <title>Index</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">
  </head>
  <body>
  <div class="container-fluid text-light">
      <nav class="navbar navbar-expand-lg green-header fixed-top" id="mainNav">      
        <p class="mt-2"><a class="navbar-brand js-scroll-trigger" href="#"><img src="images/logo.png" class="logo"></a><h5 class="text-light ml-4">CREER ET PARAMETREZ VOS QUIZZ</h5></p>
        <button class="navbar-toggler text-light navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto ">
            <li class="nav-item mr-4 mt-2">
              <img class="ml-3" src="images/avatar.jpg" width="40" height="40" alt="">
              <p>Abdoulaye</p>
            </li>
            <li class="nav-item mt-3">
              <a class="btn btn-success btn-logout" href="index.php">Déconnexion</a>
            </li>
          </ul>
        </div>    
      </nav>
      </div>
      <div class="container-fluid admin-content">
          <div class="row">
              <div class="col-lg-2 nav-section">
                <ul class="sidebar navbar-nav">
                    <li class="mb-4 nav-title"><i class="fas fa-tachometer-alt"></i> Tableau de bord</li>
                    <li class="mb-3"><a class="nav-link" href="admin-home.php?page=questions"><i class="fas fa-question-circle"></i>  Questions</a></li>
                    <li class="mb-3"><a class="nav-link" href="admin-home.php?page=administrateurs"><i class="fas fa-lock"></i> Administrateurs</a></li>
                    <li class="mb-3"><a class="nav-link" href="admin-home.php?page=joueurs"><i class="fas fa-users"></i> Joueurs</a></li>
                    <li class="mb-3"><a class="nav-link" href="admin-home.php?page=stats"><i class="fas fa-chart-line"></i> Visualisation</span></a></li>
                </ul>
              </div>
              <div class="col-lg-8 offset-1 nav-section">
                <?php
                    if (isset($_GET["page"])) {
                        include($_GET['page'].'.php');
                    }
                ?>
              </div>
          </div>
      </div>
      <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <!--
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
  </body>
</html>