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
					if (isset($_SESSION['prenom']) && isset($_SESSION['nom']) && isset($_SESSION['avatar']) && isset($_SESSION['login'])){
						$prenom=$_SESSION['prenom'];
						$nom=$_SESSION['nom'];
						$avatar=$_SESSION['avatar'];
						$login=$_SESSION['login'];
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
				<!-- <div>
					<span><a class="btn-logout" href="#myBestScore-popup">Mon meilleur score</a></span>
				</div>
				<div>
					<span><a class="btn-logout" href="#topBestScore-popup">Top 5 des meilleurs scores</a></span>
				</div> -->
				<div class="player-home-content">
					<div class="game-section">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</div>
					<div class="marks-section">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</div>
				</div>
				
			</div>
		</div>

<div id="myBestScore-popup" class="overlay">
	<div class="popup">
		<div class="bestScore">
			<h2>Votre meilleur score est de </h2>
		<a class="close" href="#">&times;</a>
			<?php
				$users = file_get_contents('fichiers/users.json');
				$users = json_decode($users);
				for ($i=0;$i<count($users);$i++){
				    if($users[$i]->{'profil'} == 'player'){
				        if($_SESSION['login'] == $users[$i]->{'login'}){
				            $max = max($users[$i]->{'score'});
				            echo "<span class='point'><em>$max pts</em></span>";
				        }
				    }
				}
			?>
		</div>
	</div>
</div>
<div id="topBestScore-popup" class="overlay">
	<div class="popup">
		<div class="bestScore">
			<h2>Voici le top 5 des meilleurs scores </h2>
		<a class="close" href="#">&times;</a>
		<table class="top-score-table">
				<thead>
					<tr>
					<td>Profil</td>
					<td>Nom</td>
					<td>Prénom</td>
					<td>Score</td>
					</tr>
				</thead>
				<tbody>
					<?php
						$player = file_get_contents('fichiers/users.json');
						$player = json_decode($player);
						$playerTab = [];
						$score = [];
						for($i=0;$i<count($player);$i++){
						    $tmp = 0;
						    if($player[$i]->{'profil'} == 'player'){
						        if (isset($player[$i]->{'score'}) && !empty($player[$i]->{'score'})){
						            $max = max($player[$i]->{'score'});
						            if($tmp<$max){
						                $tmp = $max;
						                $score[] = $tmp;

						                $playerTab[] = array(
						                	'avatar' => $player[$i]->{'avatar'},
						                    'prenom' => $player[$i]->{'prenom'},
						                    'nom'=>$player[$i]->{'nom'},
						                    'meileur_score'=>$tmp
						                );
						            }
						        }
						    }
						}
						rsort($score);
						$classement = [];
						for ($i=0;$i<count($score);$i++) {
						    for ($j = 0; $j < count($playerTab); $j++){
						        if($score[$i] == $playerTab[$j]['meileur_score']) {
						            $classement[] = array(
						            	'avatar' => $playerTab[$j]['avatar'],
						                'prenom' => $playerTab[$j]['prenom'],
						                'nom'=> $playerTab[$j]['nom'],
						                'meileur_score'=> $playerTab[$j]['meileur_score']
						            );
						        }
						    }
						}
						$classementParScore = array_unique($classement, SORT_REGULAR);
						$nbr = 0;
					    for ($j=0;$j<count($classement);$j++){
				            if(isset($classementParScore[$j])){
				            	echo '<tr>';
				                ?>
				                <td><img class="img-profil-player" src="<?php echo $classementParScore[$j]['avatar']; ?>"></td>
				                <?php
				                echo "<td>";
				                echo $classementParScore[$j]['nom'];
				                echo "</td>";
				                echo "<td>";
				                echo $classementParScore[$j]['prenom'];
				                echo "</td>";
				                echo "<td>";
				                echo $classementParScore[$j]['meileur_score'];
				                echo " pts</td>";
				                echo '</tr>';
				                $nbr++;
				            }
				            if($nbr == 5){
				                break;
				            }
						}
					?>
			</tbody>
			</table>
		</div>
	</div>
</div>
<div id="logout-popup" class="overlay">
	<div class="popup">
		<h2>Êtes-vous sûr(e) de vouloir vous déconnecter ?</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
			<a class="btn-yes-logout" href="index.php">OUI</a><a class="btn-no-logout" href="player-home.php">NON</a>
		</div>
	</div>
</div>
</body>
</html>