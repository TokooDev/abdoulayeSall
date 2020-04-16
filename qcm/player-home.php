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
				<?php
					if (isset($_SESSION['prenom']) && isset($_SESSION['nom']) && isset($_SESSION['avatar'])){
						$prenom=$_SESSION['prenom'];
						$nom=$_SESSION['nom'];
						$avatar=$_SESSION['avatar'];
					}
				?>
				<div>
					<div>
						<img class="player-home-img-avatar" src="<?php echo $avatar; ?>">
					</div>
					<p class="player-home-profil-text">
						<?php echo $prenom." ".$nom; ?>
					 </p>
				</div>
				<h1 class="player-home-text">BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ
JOUER ET TESTER VOTRE NIVEAU DE CULTURE GÉNÉRALE</h1><span class="logout"><a class="btn-logout" href="#logout-popup">Déconnexion</a></span>
			</div>
			<div class="admin-home-content">
				<div id="logout-popup" class="overlay">
					<div class="popup">
						<h2>Êtes-vous sûr(e) de vouloir vous déconnecter ?</h2>
						<a class="close" href="#">&times;</a>
						<div class="content">
							<a class="btn-yes-logout" href="index.php">OUI</a><a class="btn-no-logout" href="player-home.php">NON</a>
						</div>
					</div>
				</div>
				<div>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</div>
				
			</div>
		</div>
</body>
</html>