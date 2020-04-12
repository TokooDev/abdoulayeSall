<?php
session_start();
	if (isset($_POST['valider'])) {
		if (!empty($_POST['login']) && !empty($_POST['mdp'])) {
			$users=file_get_contents('fichiers/users.json');
			$users=json_decode($users,true);
			for ($i=0; $i <count($users) ; $i++) { 
				if ($users[$i]['login']==$_POST['login'] && $users[$i]['mdp']==$_POST['mdp']) {
					$_SESSION['avatar']=$users[$i]['avatar'];
					$_SESSION['prenom']=$users[$i]['prenom'];
					$_SESSION['nom']=$users[$i]['nom'];
					if ($users[$i]['type']=='admin') {
						header('Location: admin-home.php');
					}elseif ($users[$i]['type']=='player') {
						header('Location: player-home.php');
					}else{
						$erreurMessage="Ce type de compte n'exite pas";
					}
					

				}else{
					$erreurMessage="Login ou mot de passe incorrect";
				}
			}

		}else{
			$erreurMessage="Tous les champs sont obligatoires";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
			<div class="login">
				<div class="login-header">
				Formulaire de connexion<span class="btn-leave">X</span>
				</div>
				<div class="login-content">
					<form action="" method="POST">
						<div class="section">
							<input class="input" placeholder="Login" value="<?php if(isset($_POST['login'])){ echo $_POST['login']; } ?>" type="text" name="login" id="login"> <label for="login"><img src="images/Icônes/ic-login.png"></label>
						</div>
						<div class="section">
							<input class="input" placeholder="Password" type="password" name="mdp" id="password"> <label for="password"><img src="images/Icônes/icone-password.png" width="15"></label>
						</div>
						<?php if (isset($erreurMessage)) {
							echo "<p class='erreurMessage'>".$erreurMessage."</p>";
						} ?>
						<div>
							<input class="btn-blue" type="submit" name="valider" value="Connexion"><a class="inscription-link" href="http://localhost/FonctionsEtTableaux/saQcm/sign-up.php">S’inscrire pour jouer?</a>
						</div>
					</form>
				</div>
			</div>
		</div>
</body>
</html>