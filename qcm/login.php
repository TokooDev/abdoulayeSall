
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
							<input class="input" placeholder="Login" type="text" name="login" id="login"> <label for="login"><img src="images/Icônes/ic-login.png"></label>
						</div>
						<div class="section">
							<input class="input" placeholder="Password" type="password" name="mdp" id="password"> <label for="password"><img src="images/Icônes/icone-password.png" width="15"></label>
						</div>
						<div>
							<input class="btn-blue" type="submit" name="valider" value="Connexion"><a class="inscription-link" href="#">S’inscrire pour jouer?</a>
						</div>
					</form>
				</div>
			</div>
		</div>
</body>
</html>