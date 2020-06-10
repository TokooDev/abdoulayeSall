<?php
require_once 'db.php';
//Add
    if(isset($_POST['addUser'])){       
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
			    	$erreurMessage= "Désolé, cette image a déja été utilisée.";
				}else{
                        $sql = "SELECT *  FROM users WHERE login = '$login'";
                        $req = $db->prepare($sql);
                        $req->execute();
                        if ($req->rowCount($sql) == 0) {
                            move_uploaded_file($_FILES["avatar"]["tmp_name"], $avatar);
                            $sql=$db->prepare("INSERT INTO users (profil,prenom,nom,login,mdp1,avatar,statut) 
                                    VALUES('$profil','$prenom','$nom','$login','$mdp1','$avatar','$statut')");
                            $sql->execute();
                            $successMessage="Votre compte a été créé avec succés";
                        }else{
                            $erreurMessage="Désolé, ce login a déja été utilisé!"; 
							}	
					
				}
			}else{
				$erreurMessage="Les deux mot de passe doivent être identiques";
			}
        }else{
            $erreurMessage="Tous les champs sont obligatoires";
        }
    }

?>