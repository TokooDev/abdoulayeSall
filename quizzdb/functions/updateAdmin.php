<?php
// include Database connection file
require_once 'db.php';
// check request
if(isset($_POST))
{
    // get values
    $idUser = htmlspecialchars($_POST['idUser']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $login = htmlspecialchars($_POST['login']);
    $mdp1 = md5($_POST['mdp1']);

    // Updaste User details
    $sql = "UPDATE users SET prenom = '$prenom', nom = '$nom', login = '$login',mdp1 = '$mdp1' WHERE idUser= '$idUser'";
    $req = $db->prepare($sql);
    $req->execute();
}