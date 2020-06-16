<?php
include_once 'functions/login.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Connexion</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
      <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-10 col-sm-12 offset-lg-3 offset-md-2 mt-5">
            <div class="row">
                        <div class="col-lg-10 col-md-10 col-sm-10 offset-sm-1">
                            <?php
                            if(isset($erreurMessage)){
                                echo '<p class="alert alert-danger">'.$erreurMessage.'</p>';
                            }
                            ?>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-10 offset-sm-1 green-header">
                        <img src="assets/images/logo.png" alt="logo SA" class="logo">
                        <h3 class="login-header-title">Connexion</h3>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 offset-sm-1 login-content pt-4">
                        
                        <form method="post" action="" id="login-form">
                            
                            <div class="form-group form-section">
                            <input type="text" name="login" placeholder="Tapez votre login" class="form-control my-input"><i class="fas fa-user login-icon"></i>
                            </div>
                            <div class="form-group form-section">
                            <input type="password" name="password" placeholder="Tapez votre mot de passe" class="form-control my-input"><i class="fas fa-lock password-icon"></i>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group form-section">
                                    <input type="submit" name="loginbtn" value="Se connecter" class="btn btn-success btn-green">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <a class="sign-up-link" href="sign-up.php">S’inscrire pour jouer ?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
  </body>
</html>