
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
					<form action="" method="POST">
						<h1>S’INSCRIRE</h1>
					<h5 class="sign-up-title">Pour tester votre niveau de culture générale</h5>
					<hr class="form-limit">
					<p><input class="create-admin-input" hidden="true" value="player" type="text" name="profil"></p>
					<p><label class="sign-up-label" for="prenom">Prénom</label></p>
					<p><input class="sign-up-input" placeholder="Tapez votre prénom" type="text" id="prenom" name="prenom"></p>
					<p><label class="sign-up-label" for="nom">Nom</label></p>
					<p><input class="sign-up-input" placeholder="Tapez votre nom" type="text" id="nom" name="nom"></p>
					<p><label class="sign-up-label" for="login">Login</label></p>
					<p><input class="sign-up-input" placeholder="Tapez votre login" type="text" id="login" name="login"></p>
					<p><label class="sign-up-label" for="mdp">Mot de passe</label></p>
					<p><input class="sign-up-input" placeholder="Tapez votre mot de passe" type="password" id="mdp" name="mdp"></p>
					<p><label class="sign-up-label" for="mdp2">Confirmation du mot de passe</label></p>
					<p><input class="sign-up-input" placeholder="Confirmez votre mot de passe" type="password" id="mdp2" name="mdp2"></p>
					<p><label hidden="true" class="sign-up-label" for="avatar">Avatar</label><input hidden="true" class="avatar-input"  type="file" id="avatar" name="avatar"></p>
					<p><input class="btn-sign-up" type="submit" name="valider" value="Créer compte"> <span>Vous avez un compte? <a class="inscription-link" href="index.php">Connectez-vous</a></span></p>
					</form>
				</div>
				<div class="right">
					<img src="images/avatar.jpg">
				</div>
			</div>
		</div>
</body>
</html>