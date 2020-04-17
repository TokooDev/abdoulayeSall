<?php
	if (isset($_POST['valider'])) {
			$user=array();
			$user['profil']=$_POST['profil'];
			$user['prenom']=$_POST['prenom'];
			$user['nom']=$_POST['nom'];
			$user['login']=$_POST['login'];
			$user['mdp']=$_POST['mdp'];
			$user['mdp2']=$_POST['mdp2'];
			$dossierImages = "images/users-images/";
			$avatar = $dossierImages . basename($_FILES["avatar"]["name"]);
			$formatImage = strtolower(pathinfo($avatar,PATHINFO_EXTENSION));
			$user['avatar']=$avatar;
			if($user['mdp']==$user['mdp2']){
				 if (file_exists($avatar)) {
			    	$erreurMessage= "Désolé, cette image existe déja.";
				}else{
					if($formatImage != "jpg" && $formatImage != "png" && $formatImage != "jpeg" ) {
					    $erreurMessage= "Désolé, seules les images au format jpeg et png sont autorisées";
					}else{
					        $users=file_get_contents('fichiers/users.json');
							$users=json_decode($users,true);
							$verif=0;
							for ($i=0; $i < count($users) ; $i++) {
								if($users[$i]['login']==$_POST['login']){
									$verif=1;
								}
							}
							if($verif==1){
								$erreurMessage="Désolé, ce login a déja été utilisé";
							}else{
								move_uploaded_file($_FILES["avatar"]["tmp_name"], $avatar);
								$users[]=$user;
								$users=json_encode($users);
								file_put_contents('fichiers/users.json', $users);
								header("location: index.php");
							}	
					}
				}
			}else{
				$erreurMessage="Les deux mot de passe doivent être identiques";
			}
}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>S'inscrire</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Abdoulaye SALL" />
	<meta name="description" content="Sonatel Academy, projet_02 php"/>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
		<div class="header">
			<div class="logo">
				<img src="images/logo-QuizzSA.png" width="70" height="80">
			</div>
			<div class="title">
				<h1>Le plaisir de jouer</h1>
			</div>
		</div>
		<div class="content">
			<div class="sign-up">
				<div class="left">
					<form action="" method="POST" enctype="multipart/form-data" id="form-connexion">
						<h1>S’INSCRIRE</h1>
					<h5 class="sign-up-title">Pour tester votre niveau de culture générale</h5>
					<?php if (isset($erreurMessage)) {
						echo "<p class='erreurMessage'>".$erreurMessage."</p>";
					} ?>
					<hr class="form-limit">
					<p><input class="create-admin-input" hidden="true" value="player" type="text" name="profil"></p>
					<p><label class="sign-up-label" for="prenom">Prénom</label></p>
					<p><input class="sign-up-input" value="<?php if(isset($_POST['prenom'])){ echo $_POST['prenom']; } ?>" error="error-1" placeholder="Tapez votre prénom" type="text" id="prenom" name="prenom"></p><p class='input-validation' id="error-1"></p>
					<p><label class="sign-up-label" for="nom">Nom</label></p>
					<p><input class="sign-up-input" value="<?php if(isset($_POST['nom'])){ echo $_POST['prenom']; } ?>" error="error-2" placeholder="Tapez votre nom" type="text" id="nom" name="nom"></p>
					<p class='input-validation' id="error-2"></p>
					<p><label class="sign-up-label" for="login">Login</label></p>
					<p><input class="sign-up-input" value="<?php if(isset($_POST['prenom'])){ echo $_POST['login']; } ?>" error="error-3" placeholder="Tapez votre login" type="text" id="login" name="login"></p><p class='input-validation' id="error-3"></p>
					<p><label class="sign-up-label" for="mdp">Mot de passe</label></p>
					<p><input class="sign-up-input" error="error-4" placeholder="Tapez votre mot de passe" type="password" id="mdp" name="mdp"></p><p class='input-validation' id="error-4"></p>
					<p><label class="sign-up-label" for="mdp2">Confirmation du mot de passe</label></p>
					<p><input class="sign-up-input" error="error-5" placeholder="Confirmez votre mot de passe" type="password" id="mdp2" name="mdp2"></p><p class='input-validation' id="error-5"></p>
					<p><label class="sign-up-label" for="avatar">Avatar</label><input class="avatar-input" error="error-6"  type="file" id="avatar" onchange="affichageAvatar();" name="avatar"></p><p class='input-validation' id="error-6"></p>
					<p>
						<input class="btn-sign-up" type="submit" name="valider" value="Créer compte"> <span>Vous avez un compte? <a class="inscription-link" href="index.php">Connectez-vous ici</a></span></p>
					</form>
				</div>
				<div class="right" id="avatarSection">
					
				</div>
			</div>
		</div>
<script type="text/javascript">
	document.getElementById("form-connexion").addEventListener("submit",function(e){
		const inputs= document.getElementsByTagName("input");
		var error=false;
		for(input of inputs){
			if(input.hasAttribute("error")){
				var idDivError=input.getAttribute("error");
			if(!input.value){
				document.getElementById(idDivError).innerText="Ce champ est obligatoire"
				error=true;
				}
				
			}
		}
		if(error){
			e.preventDefault();
			return false;
		}
	})
	const inputs= document.getElementsByTagName("input");
	for(input of inputs){
		input.addEventListener("keyup",function(e){
			if (e.target.hasAttribute("error")){
				var idDivError=e.target.getAttribute("error");
				document.getElementById(idDivError).innerText=""
			}
		})
	}

	var avatarSection=document.getElementById("avatarSection");
	function affichageAvatar(){
		var avatar=document.getElementById("avatar");
		var lireAvatar= new FileReader();
		lireAvatar.readAsDataURL(avatar.files[0]);
		lireAvatar.onloadend=function(e){
			avatarSection.innerHTML='<img class="signup-avatar" id="avatar" src="'+e.target.result+'" alt="">'
		}
	}
</script>

</body>
</html>