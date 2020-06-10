<?php
    include("db.php");
    //Add
    $response = array( 
    'status' => 0, 
    'message' => 'Erreur de soummission.' 
); 
    if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['login']) && isset($_POST['mdp1']) && isset($_POST['mdp2'])){
        if(!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['login']) && !empty($_POST['mdp1']) && !empty($_POST['mdp2'])){
        $profil=htmlspecialchars($_POST['profil']);
        $prenom=htmlspecialchars($_POST['prenom']);
        $nom=htmlspecialchars($_POST['nom']);
        $login=htmlspecialchars($_POST['login']);
        $mdp1=md5($_POST['mdp1']);
        $mdp2=md5($_POST['mdp2']);
        $dossierImages = "assets/images/users-images/";
        $avatar = $dossierImages.basename($_FILES["avatar"]["name"]);
        $formatImage = strtolower(pathinfo($avatar,PATHINFO_EXTENSION));
        $statut=htmlspecialchars($_POST['statut']);
        if($mdp1==$mdp2){
                if (file_exists($avatar)) {
                $response['message'] = 'Désolé, cette image a déja été utilisée.';
            }else{
                    $sql = "SELECT *  FROM users WHERE login = '$login'";
                    $req = $db->prepare($sql);
                    $req->execute();
                    if ($req->rowCount($sql) == 0) {
                        move_uploaded_file($_POST["avatar"], $avatar);
                        $sql="INSERT INTO users (profil,prenom,nom,login,mdp1,avatar,statut) 
                                VALUES('$profil','$prenom','$nom','$login','$mdp1','$avatar','$statut')";
                        $req = $db->prepare($sql);
                        $req->execute();
                    }else{
                        $response['message'] ='Désolé, ce login a déja été utilisé!'; 
                        }	
                if($req){
                    $response['status'] = 1; 
                    $response['message'] = 'Votre compte a été créé avec succés';
                }
            }
        }else{
            $response['message'] = 'Les deux mot de passe doivent être identiques';
        }
    }else{
        $response['message'] = 'Tous les champs sont obligatoires';
    }
}
echo json_encode($response);
?>