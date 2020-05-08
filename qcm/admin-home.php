<?php 
session_start();
	if(empty($_SESSION['login'])) 
	{
	  // Si nulle, on redirige vers la page de connexion
	  header('Location: index.php');
	  exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Abdoulaye SALL" />
	<meta name="description" content="Sonatel Academy, projet_02 php"/>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
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
			<div class="admin-home-header">
				<h1 class="admin-home-text">CRÉER ET PARAMÉRTER VOS QUIZZ</h1><span class="logout"><a class="btn-logout" href="#logout-popup">Déconnexion</a></span>
			</div>
			<div class="admin-home-content">
				<?php
							if (isset($_SESSION['prenom']) && isset($_SESSION['nom']) && isset($_SESSION['avatar'])){
								$prenom=$_SESSION['prenom'];
								$nom=$_SESSION['nom'];
								$avatar=$_SESSION['avatar'];
							}
						?>
				<div class="side-navbar">
					<div class="side-navbar-header">
						
						<div class="profil-avatar">
							<img class="img-avatar" src="<?php echo $avatar; ?>">
						</div>
						<p class="profil-text">
							<?php echo $prenom." ".$nom; ?>
						 </p>
					</div>
					<div class="side-navbar-content">
						<a class="nav-link" href="admin-home.php?page=questionsList">
							<div <?php 
								if ($_GET['page']=='questionsList'){
									echo 'class="list-item-active"';
								}else{
									echo 'class="list-item"';
								} 
								?>>Liste Questions
								<span class="navbar-icon">
									<img <?php 
										if ($_GET['page']=='questionsList'){
											echo 'src="images/icones/ic-liste-active.png"';
										}else{
											echo 'src="images/icones/ic-liste.png"';
										} 
									?> >
								</span>
							</div>
						</a>
						<a class="nav-link" href="admin-home.php?page=createAdmin">
							<div <?php 
								if ($_GET['page']=='createAdmin'){
									echo 'class="list-item-active"';
								}else{
									echo 'class="list-item"';
								} 
								?>>Créer Admin
								<span class="navbar-icon">
									<img <?php 
										if ($_GET['page']=='createAdmin'){
											echo 'src="images/icones/ic-ajout-active.png"';
										}else{
											echo 'src="images/icones/ic-ajout.png"';
										} 
									?> >
								</span>
							</div>
						</a>
						<a class="nav-link" href="admin-home.php?page=playersList">
							<div <?php 
								if ($_GET['page']=='playersList'){
									echo 'class="list-item-active"';
								}else{
									echo 'class="list-item"';
								} 
								?>>Liste Joueurs
								<span class="navbar-icon">
									<img <?php 
										if ($_GET['page']=='playersList'){
											echo 'src="images/icones/ic-liste-active.png"';
										}else{
											echo 'src="images/icones/ic-liste.png"';
										} 
									?> >
								</span>
							</div>
						</a>
						<a class="nav-link" href="admin-home.php?page=createQuestion">
							<div <?php 
								if ($_GET['page']=='createQuestion'){
									echo 'class="list-item-active"';
								}else{
									echo 'class="list-item"';
								} 
								?>>Créer Question
								<span class="navbar-icon">
									<img <?php 
										if ($_GET['page']=='createQuestion'){
											echo 'src="images/icones/ic-ajout-active.png"';
										}else{
											echo 'src="images/icones/ic-ajout.png"';
										} 
									?> >
								</span>
							</div>
						</a>
						<a class="nav-link" href="admin-home.php?page=stats">
							<div <?php 
								if ($_GET['page']=='stats'){
									echo 'class="list-item-active"';
								}else{
									echo 'class="list-item"';
								} 
								?>>Visualisation
								<span class="navbar-icon">
									<img <?php 
										if ($_GET['page']=='stats'){
											echo 'src="images/icones/dashboard-active.png"';
										}else{
											echo 'src="images/icones/dashboard.png"';
										} 
									?> >
								</span>
							</div>
						</a>
					</div>
					
				</div>
				<div class="content-to-load">
					<?php
						if (isset($_GET["page"])) {
						    include($_GET['page'].'.php');
						}
					?>
				</div>
			</div>
		</div>
		<div id="logout-popup" class="overlay">
			<div class="popup">
				<h2>Êtes-vous sûr(e) de vouloir vous déconnecter ?</h2>
				<a class="close" href="#">&times;</a>
				<div class="content">
					<a class="btn-yes-logout" href="index.php">OUI</a><a class="btn-no-logout" href="admin-home.php?page=<?php echo($_GET['page']); ?>">NON</a>
				</div>
			</div>
		</div>
<script type="text/javascript" src="js/scripts.js"></script>
</body>
</html>