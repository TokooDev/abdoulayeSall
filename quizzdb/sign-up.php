<?php
require_once ('functions/sign.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Index</title>
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
            <div class="col-lg-8 col-md-12 col-sm-12 offset-lg-2 mt-4">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-10 offset-sm-1 green-header">
                        <div class="row">
                            <div class="col-2 mt-2">
                                <img src="assets/images/logo.png" alt="logo SA" class="logo">
                            </div>
                            <div class="col-8 mt-2 text-light">
                                <h3 class="sign-up-header-title">S’INSCRIRE</h3>
                                <p>Pour tester votre niveau de culture générale</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 offset-sm-1 login-content pt-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php
                                if(isset($erreurMessage)){
                                    echo '<p class="alert alert-danger">'.$erreurMessage.'</p>';
                                }elseif(isset($successMessage)){
                                    echo '<p class="alert alert-success">'.$successMessage.'</p>';
                                }
                                ?>
                            </div>
                        </div>
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="profil" hidden="true" value="player">
                                    </div>
                                    <div class="form-group">
                                        <label class="ml-2 text-secondary" for="prenom">Prénom</label>
                                        <input type="text" name="prenom" id="prenom" placeholder="Tapez votre prénom" class="form-control my-input">
                                    </div>
                                    <div class="form-group">
                                        <label class="ml-2 text-secondary" for="nom">Nom</label>
                                        <input type="text" name="nom" id="nom" placeholder="Tapez votre nom" class="form-control my-input">
                                    </div>
                                    <div class="form-group">
                                        <label class="ml-2 text-secondary" for="login">Login</label>
                                        <input type="text" name="login" id="login" placeholder="Tapez votre login" class="form-control my-input">
                                    </div>
                                    <div class="form-group">
                                        <label class="ml-2 text-secondary" for="mdp1">Mot de passe</label>
                                        <input type="password" name="mdp1" id="mdp1" placeholder="Tapez votre mot de passe" class="form-control my-input">
                                    </div>
                                    <div class="form-group">
                                        <label class="ml-2 text-secondary" for="mdp2">Confirmation mot de passe</label>
                                        <input type="password" name="mdp2" id="mdp2" placeholder="Confirmez votre mot de passe" class="form-control my-input">
                                    </div>
                                    <div class="form-group">
                                        <label class="ml-2 text-secondary" for="avatar">Avatar</label>
                                        <input type="file" name="avatar" onchange="affichageAvatar();" id="avatar" class="form-control-file my-input">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="statut" hidden="true" value="actif">
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                            <input type="submit" name="addUser" value="Créer compte" class="btn btn-success btn-green">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <a class="nav-link sign-up-link" href="index.php">Se connecter ?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 offset-1">
                                    <div class="avatar" id="avatarSection">

                                    </div>
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