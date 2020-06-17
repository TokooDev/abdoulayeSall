<?php
require_once 'functions/db.php';
global $db;
$admin = $db->query('SELECT COUNT(login) FROM users WHERE profil = "admin"');
$joueur = $db->query('SELECT COUNT(login) FROM users WHERE profil = "player"');
$questions = $db->query('SELECT COUNT(id) FROM questions');

$admin = $admin->fetch();
$joueur = $joueur->fetch();
$questions= $questions->fetch();





?>
<div class="container text-green">
    <div class="row">
        <div class="col-12 mt-3 ">
            <h1 class="titre-dashboard">Visualisations</h1>
        </div>
    </div>
    <div class="row">
        <div class="col border  border mt-2 w-75 ml-lg-5">
           <div class="row h-100">
               <div class="col-4 icone-dashbord  icone-dashord-admin ">
                   <div class="row">
                       <div class="col-5 offset-3  pt-xl-5 pb-xl-4 pt-lg-4 pb-lg-5 pl-lg-1 p-1 position-relative">
                           <i class="fas fa-5x fa-lock"></i>
                       </div>
                   </div>
               </div>
               <div class="col-8 h-100 nav-link">
                   <div class="p-3 pt-xl-5 pb-xl-5 pt-lg-4 pb-lg-4">
                   <div class="row">
                       <div class="col">
                           <h6 class="titre-element-dashboard">Nombre d'administateurs</h6>
                       </div>
                   </div>
                  <div class="border-bottom"></div>
                   <div class="row">
                       <div class="col">
                           <h6 class="pt-1 titre-element-dashboard"><?php  echo $admin[0];?></h6>
                       </div>
                   </div>
                   </div>
               </div>
           </div>
        </div>
        <!--A ne pas supprimer-->
        <div class="col-md-auto">
        </div>

        <div class="col border  border mt-2 w-75 ml-lg-5">
            <div class="row h-100">
                <div class="col-4 icone-dashbord icone-dashord-joueur ">
                    <div class="row">
                        <div class="col-5 offset-3  pt-xl-5 pb-xl-4 pt-lg-4 pb-lg-5 pl-lg-1 p-1 position-relative">
                            <i class="fas fa-5x fa-users"></i>
                        </div>
                    </div>
                </div>
                <div class="col-8 h-100 nav-link">
                    <div class="p-3 pt-xl-5 pb-xl-5 pt-lg-4 pb-lg-4">
                        <div class="row">
                            <div class="col">
                                <h6 class="titre-element-dashboard">Nombre de joueurs</h6>
                            </div>
                        </div>
                        <div class="border-bottom"></div>
                        <div class="row">
                            <div class="col">
                                <h6 class="pt-1 titre-element-dashboard"><?php  echo $joueur[0];?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col border  border mt-2 w-75 ml-lg-5">
            <div class="row h-100">
                <div class="col-4 icone-dashbord  icone-dashord-question ">
                    <div class="row">
                        <div class="col-5 offset-3  pt-xl-5 pb-xl-4 pt-lg-4 pb-lg-5 pl-lg-1 p-1 position-relative">
                            <i class="fas fa-5x fa-question-circle"></i>
                        </div>
                    </div>
                </div>
                <div class="col-8 h-100 nav-link">
                    <div class="p-3 pt-xl-5 pb-xl-5 pt-lg-4 pb-lg-4">
                        <div class="row">
                            <div class="col">
                                <h6 class="titre-element-dashboard">Nombre de questions</h6>
                            </div>
                        </div>
                        <div class="border-bottom"></div>
                        <div class="row">
                            <div class="col">
                                <h6 class="pt-1 titre-element-dashboard"><?php  echo $questions[0];?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--A ne pas supprimer-->
        <div class="col-md-auto">
        </div>

        <div class="col border  border mt-2 w-75 ml-lg-5">
            <div class="row h-100">
                <div class="col-4 icone-dashbord icone-dashord-meilleur-joueur ">
                    <div class="row">
                        <div class="col-5 offset-3  pt-xl-5 pb-xl-4 pt-lg-4 pb-lg-5 pl-lg-1 p-1 position-relative">
                            <i class="fas fa-5x fa-gamepad"></i>
                        </div>
                    </div>
                </div>
                <div class="col-8 h-100 nav-link">
                    <div class="p-3 pt-xl-5 pb-xl-5 pt-lg-4 pb-lg-4">
                        <div class="row">
                            <div class="col">
                                <h6 class="titre-element-dashboard">Meilleur Score</h6>
                            </div>
                        </div>
                        <div class="border-bottom"></div>
                        <div class="row">
                            <div class="col">
                                <h6 class="pt-1 titre-element-dashboard">Nombre</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>