<?php
require_once ('functions/db.php');
    $perPage = 5;
    $s = $db->prepare("SELECT * FROM users WHERE profil='admin'");
    $s->execute();
    $total_results = $s->rowCount();
    $totalPages = ceil($total_results/$perPage);

?>
<div class="row">
    <div class="col-12 mt-4">
        <div class="row">
            <div class="col-10">
                <h5 class="title-green"> <i class="fas fa-list"></i> LISTE DES ADMINISTRATEURS</h5>
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-success btn-green" data-toggle="modal" data-target="#addAdmin"><i class="fas fa-plus-circle"></i> <span class="d-none d-md-inline d-sm-none d-xs-none d-xs-none d-lg-inline">Ajouter</span></button>
            </div>
        </div>
    </div>
    <div class="col-12 mt-4">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Nom d'utilisateur</th>
                    <th class=" text-center d-none d-md-block d-sm-none d-xs-none d-xs-none d-lg-block">Etat du compte</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="content" class="admins_data">     
            </tbody>
        </table>   
        <div id="admins_data">
        </div>    
        <input type="hidden" id="totalPages" value="<?php echo $totalPages; ?>">
   
    </div>
    
</div>
<!-- ADD -->
<div class="modal" id="addAdmin" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="addAdminLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title title-green" id="addAdminLabel"><i class="fas fa-plus-square"></i> AJOUT D'UN ADMINISTRATEUR</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="statusMsg"></div>
        <div class="col-lg-12 col-md-10 col-sm-10 pt-4">
                        
                        <form method="post" action="" id="addAdmin-form" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-6">
                                    <div class="form-group">
                                        <input type="hidden" id="profil" name="profil" value="admin">
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
                                    <div class="form-group" onchange="affichageAvatar();">
                                        <label class="ml-2 text-secondary" for="avatar">Avatar</label>
                                        <input type="file" name="avatar" id="avatar" class="form-control-file my-input">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" id="statut" name="statut" value="actif">
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                            <input type="submit" name="addAdmin" value="Créer compte" class="btn addAdminBtn btn-success btn-green">
                                            </div>
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
<!-- EDIT -->
<div class="modal fade" id="editAdmin"  tabindex="-1" role="dialog" aria-labelledby="editAdminTitle" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title title-green" id="addAdminLabel"><i class="fas fa-edit"></i> MODIFIER UN ADMINISTRATEUR</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <div class="col-lg-12 col-md-12 col-sm-12 pt-4">
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
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="ml-2 text-secondary" for="prenom">Prénom</label>
                                        <input type="text" name="prenom" id="update_prenom" placeholder="Tapez votre prénom" class="form-control my-input">
                                    </div>
                                    <div class="form-group">
                                        <label class="ml-2 text-secondary" for="nom">Nom</label>
                                        <input type="text" name="nom" id="update_nom" placeholder="Tapez votre nom" class="form-control my-input">
                                    </div>
                                    <div class="form-group">
                                        <label class="ml-2 text-secondary" for="login">Login</label>
                                        <input type="text" name="login" id="update_login" placeholder="Tapez votre login" class="form-control my-input">
                                    </div>
                                    <div class="form-group">
                                        <label class="ml-2 text-secondary" for="mdp1">Mot de passe</label>
                                        <input type="password" name="mdp1" id="update_mdp1" placeholder="Tapez votre mot de passe" class="form-control my-input">
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                            <button type="button" class="btn btn-success btn-green" onclick="UpdateAdmin()">Enregistrer</button>
                                            <input type="hidden" id="hidden_idUser">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
        </div>
    </div>
  </div>
</div>