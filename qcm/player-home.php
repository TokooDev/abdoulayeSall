<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Player Home</title>
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
			<div class="player-home-header">
				<div>
					<div>
						<?php
							if (isset($_SESSION['avatar'])) {
								$avatar=$_SESSION['avatar'];
								?>

								<img class="player-home-img-avatar" src="<?php echo $avatar; ?>">
								<?php
							}
					 	?>
						
					</div>
					<p class="player-home-profil-text">
						<?php
							if (isset($_SESSION['prenom']) && isset($_SESSION['nom'])) {
								$prenom=$_SESSION['prenom'];
								$nom=$_SESSION['nom'];
								echo $prenom." ".$nom;
							}
					 	?>
					 	
					 </p>
				</div>
				<h1 class="player-home-text">BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ
JOUER ET TESTER VOTRE NIVEAU DE CULTURE GÉNÉRALE</h1><span class="logout"><a class="btn-logout" href="login.php">Déconnexion</a></span>
			</div>
			<div class="admin-home-content">
				
			</div>
		</div>
</body>
</html>