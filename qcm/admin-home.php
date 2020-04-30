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
				
				<div class="side-navbar">
					<div class="side-navbar-header">
						<?php
							if (isset($_SESSION['prenom']) && isset($_SESSION['nom']) && isset($_SESSION['avatar'])){
								$prenom=$_SESSION['prenom'];
								$nom=$_SESSION['nom'];
								$avatar=$_SESSION['avatar'];
							}
						?>
						<div class="profil-avatar">
							<img class="img-avatar" src="<?php echo $avatar; ?>">
						</div>
						<p class="profil-text">
							<?php echo $prenom." ".$nom; ?>
						 </p>
					</div>
					<div class="side-navbar-content">
						<a class="nav-link" href="admin-home?page=questionsList">
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
											echo 'src="images/Icônes/ic-liste-active.png"';
										}else{
											echo 'src="images/Icônes/ic-liste.png"';
										} 
									?> >
								</span>
							</div>
						</a>
						<a class="nav-link" href="admin-home?page=createAdmin">
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
											echo 'src="images/Icônes/ic-ajout-active.png"';
										}else{
											echo 'src="images/Icônes/ic-ajout.png"';
										} 
									?> >
								</span>
							</div>
						</a>
						<a class="nav-link" href="admin-home?page=playersList">
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
											echo 'src="images/Icônes/ic-liste-active.png"';
										}else{
											echo 'src="images/Icônes/ic-liste.png"';
										} 
									?> >
								</span>
							</div>
						</a>
						<a class="nav-link" href="admin-home?page=createQuestion">
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
											echo 'src="images/Icônes/ic-ajout-active.png"';
										}else{
											echo 'src="images/Icônes/ic-ajout.png"';
										} 
									?> >
								</span>
							</div>
						</a>
						<a class="nav-link" href="admin-home?page=stats">
							<div <?php 
								if ($_GET['page']=='stats'){
									echo 'class="list-item-active"';
								}else{
									echo 'class="list-item"';
								} 
								?>>Quelques statistiques
								<span class="navbar-icon">
									<img <?php 
										if ($_GET['page']=='stats'){
											echo 'src="images/Icônes/ic-ajout-active.png"';
										}else{
											echo 'src="images/Icônes/ic-ajout.png"';
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
<script type="text/javascript">
	jQuery(document).ready(function() {

			jQuery('.form-wizard-wrapper').find('.form-wizard-link').click(function(){
				jQuery('.form-wizard-link').removeClass('active');
				var innerWidth = jQuery(this).innerWidth();
				jQuery(this).addClass('active');
				var position = jQuery(this).position();
				jQuery('.form-wizardmove-active').css({"left": position.left, "width": innerWidth});
				var attr = jQuery(this).attr('data-attr');
				jQuery('.form-wizard-content').each(function(){
					if (jQuery(this).attr('data-tab-content') == attr) {
						jQuery(this).addClass('show');
					}else{
						jQuery(this).removeClass('show');
					}
				});
			});
			jQuery('.form-wizard-next-btn').click(function() {
				var next = jQuery(this);
				next.parents('.form-wizard-content').removeClass('show');
				next.parents('.form-wizard-content').next('.form-wizard-content').addClass('show');
				jQuery(document).find('.form-wizard-content').each(function(){
					if(jQuery(this).hasClass('show')){
						var formAtrr = jQuery(this).attr('data-tab-content');
						jQuery(document).find('.form-wizard-wrapper li a').each(function(){
							if(jQuery(this).attr('data-attr') == formAtrr){
								jQuery(this).addClass('active');
								var innerWidth = jQuery(this).innerWidth();
								var position = jQuery(this).position();
								jQuery(document).find('.form-wizardmove-active').css({"left": position.left, "width": innerWidth});
							}else{
								jQuery(this).removeClass('active');
							}
						});
					}
				});
			});
			jQuery('.form-wizard-previous-btn').click(function() {
				var prev =jQuery(this);
				prev.parents('.form-wizard-content').removeClass('show');
				prev.parents('.form-wizard-content').prev('.form-wizard-content').addClass('show');
				jQuery(document).find('.form-wizard-content').each(function(){
					if(jQuery(this).hasClass('show')){
						var formAtrr = jQuery(this).attr('data-tab-content');
						jQuery(document).find('.form-wizard-wrapper li a').each(function(){
							if(jQuery(this).attr('data-attr') == formAtrr){
								jQuery(this).addClass('active');
								var innerWidth = jQuery(this).innerWidth();
								var position = jQuery(this).position();
								jQuery(document).find('.form-wizardmove-active').css({"left": position.left, "width": innerWidth});
							}else{
								jQuery(this).removeClass('active');
							}
						});
					}
				});
			});
		});
</script>
</body>
</html>