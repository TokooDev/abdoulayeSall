<?php 
session_start();

	if(empty($_SESSION['login'])) 
	{
	  // Si nulle, on redirige vers la page de connexion
	  header('Location: index.php');
	  exit();
	}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Admin-home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
  <div class="container-fluid text-light">
      <nav class="navbar navbar-expand-lg green-header fixed-top" id="mainNav">      
        <p class="mt-2"><a class="navbar-brand js-scroll-trigger" href="#"><img src="assets/images/logo.png" class="logo"></a><h5 class="text-light ml-4">CREER ET PARAMETREZ VOS QUIZZ</h5></p>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto ">
            <li class="nav-item mr-4 mt-2">
            <?php
                if (isset($_SESSION['login']) && isset($_SESSION['avatar'])){
                    $login=$_SESSION['login'];
                    $avatar=$_SESSION['avatar'];
                }
            ?>
              <img class="ml-4 rounded-circle" src="<?php echo $avatar; ?>" width="40" height="40" alt="">
              <p>Bonjour <?php echo $login; ?></p>
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
                    <li class="mb-3"><a class="nav-link" href="admin-home.php?page=players"><i class="fas fa-users"></i> Joueurs</a></li>
                    <li class="mb-3"><a class="nav-link" href="admin-home.php?page=players"><i class="fas fa-chart-line"></i> Visualisation</span></a></li>
                </ul>
              </div>
              <div class="col-lg-9 content-to-load-section">
                <?php
                    if (isset($_GET["page"])) {
                        include($_GET['page'].'.php');
                    }
                ?>
              </div>
              
          </div>
      </div>
      <!-- <script src="./assets/jquery/jquery.min.js"></script>
    <script src="./assets/bootstrap/js/bootstrap.min.js"></script> -->

    
    <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/bootstrap.paginator.js"></script>
  </body>
</html>