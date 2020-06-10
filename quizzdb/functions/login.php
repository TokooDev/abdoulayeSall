<?php
session_start();
    require_once 'db.php';
    if(isset($_POST['loginbtn'])) { 
    if(empty($_POST['login']) || empty($_POST['password'])) {  
       $erreurMessage="Tous les champs sont obligatoires!";
    }else {
        $login = htmlspecialchars($_POST['login']);
        $password =md5($_POST['password']);
        $sql = $db->prepare ("SELECT *  FROM users WHERE login = '$login' AND mdp1= '$password'");
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        $count = $sql->rowCount();
        if($count  != 0 ){
            $_SESSION['login'] = $row['login'];
            $_SESSION['avatar']= $row['avatar'];
            if($row['profil']=="admin" ){
                header('location: admin-home.php?page=questions');
            }else{
                if($row['statut']=='bloqué'){
                    $erreurMessage="Désolé ce compte a été bloqué, contacter l'admin svp!";
                }else{
                    header('location: player-home.php');
                }
            } 
        }else{
            $erreurMessage="Login ou mot de passe incorrect";
        }
               
    }
    }

?>