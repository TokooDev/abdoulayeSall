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
	<title>Player Home</title>
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
				<h1 class="player-home-text">
					BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ
					JOUER ET TESTER VOTRE NIVEAU DE CULTURE GÉNÉRALE
					</h1><span class="logout"><a class="btn-logout" href="#logout-popup">Déconnexion</a></span>
			</div>
			<div class="admin-home-content">
				<div class="player-home-content">
					<div class="game-section">
						<?php
						$users = file_get_contents('fichiers/users.json');
						$users = json_decode($users);
		                $questions = file_get_contents('fichiers/questions.json');
		                $questions = json_decode($questions);
		                shuffle($questions);
		                for ($i=0; $i<count($questions); $i++){
		                    if ($questions[$i]){
		                        $reponse = '';
		                        $_SESSION['score'] = $questions[$i]->{'score'};
		                        if (is_object($questions[$i]->{'reponse'})) {
		                            if(sizeof($questions[$i]->{'reponse'}->{'bonne_reponse'}) == 1){
		                                if(isset($_POST['btnNext']) || isset($_POST['btnLeave'])){
		                                    if(isset($_POST["reponse0"])){
		                                        if(isset($questions[$i]->{'reponse'}->{'bonne_reponse'}[0])){
		                                            if ($questions[$i]->{'reponse'}->{'bonne_reponse'}[0] == $_POST["reponse0"]){
		                                                $reponse = 1;
		                                            }
		                                        }
		                                    }
		                                    for ($k=0;$k<count($questions[$i]->{'reponse'}->{'fausse_reponse'});$k++){
		                                        if(isset($_POST['btnNext']) || isset($_POST['btnLeave'])){
		                                            if(isset($_POST["reponse0"])){
		                                                if(isset($questions[$i]->{'reponse'}->{'fausse_reponse'}[$k])){
		                                                    if ($questions[$i]->{'reponse'}->{'fausse_reponse'}[$k] == $_POST["reponse0"]){
		                                                        $reponse = 2;
		                                                    }
		                                                }
		                                            }
		                                        }
		                                    }
		                                }
		                            }
		                            if(sizeof($questions[$i]->{'reponse'}->{'bonne_reponse'}) > 1){
		                                for ($j=0; $j<sizeof($questions[$i]->{'reponse'}->{'bonne_reponse'});$j++){

		                                    if(isset($_POST['btnNext']) || isset($_POST['btnLeave'])){
		                                        if(isset($_POST["reponse_bonne$j"])){
		                                            if(isset($questions[$i]->{'reponse'}->{'bonne_reponse'}[$j])){
		                                                if ($questions[$i]->{'reponse'}->{'bonne_reponse'}[$j] == $_POST["reponse_bonne$j"]){
		                                                    $reponse = 1;
		                                                }
		                                            }
		                                        }
		                                    }
		                                }
		                                for ($k=0;$k<count($questions[$i]->{'reponse'}->{'fausse_reponse'});$k++){
		                                    if(isset($_POST['btnNext']) || isset($_POST['btnLeave'])){
		                                        if(isset($_POST["reponse$k"])){
		                                            if(isset($questions[$i]->{'reponse'}->{'fausse_reponse'}[$k])){
		                                                if ($questions[$i]->{'reponse'}->{'fausse_reponse'}[$k] == $_POST["reponse$k"]){
		                                                    $reponse = 2;
		                                                }
		                                            }
		                                        }
		                                    }
		                                }
		                            }

		                            if($reponse == 1){
		                                $_SESSION['rep']['score'] = $_SESSION['rep']['score'] + $_SESSION['score'];
		                            }
		                        }
		                        else{
		                            if(isset($_POST['btnNext']) || isset($_POST['btnLeave'])){
		                                if (isset($_POST["reponse_texte0"])){
		                                    if(isset($questions[$i]->{'reponse'})){
		                                        if ($questions[$i]->{'reponse'} == $_POST["reponse_texte0"]) {
		                                            $_SESSION['rep']['score'] = $_SESSION['rep']['score'] + $_SESSION['score'];
		                                        }
		                                    }
		                                }
		                            }

		                        }
		                    }

		                }
		                if(!isset($_POST['btnLeave'])){
		                   ?>

						    <div class="questionHeader">
						        <?php
						        $nbreQuestion = file_get_contents('fichiers/nbreQuestion.json');
						        $nbreQuestion = json_decode($nbreQuestion);
						        echo '<form action="';
						        echo '" method="post" id="game-form">';
						        $question_afficher = '';
		        				$n=1;
						        echo '<h1 class="questionTitle">Question '.$_SESSION['n'].'/' .$nbreQuestion[0]. '</h1>';
						        $size = count($questions);
						        $_SESSION['nbrpts'] = 0;
						        if (isset($_GET['pages'])) {
						            $_GET['pages'] = intval($_GET['pages']);
						            $currentPage = $_GET['pages'];
						        } else {
						            $currentPage = 1;
						        }
						        $pos = rand(0, $size);
						        $count =  $nbreQuestion[0];
						        $perPage = 1;
						        $pages = ceil($count / $perPage);
						        $offeset = $perPage * ($currentPage - 1);
						        $questions = array_slice($questions, $offeset, $perPage);
						        for ($i=0; $i<count($questions); $i++) {
						            if ($questions[$i]) {
						                $question =  $questions[$i]->{'questions'};
						                echo "<h4 class='gameQuestion'>$question</h4>";
						            }
						        }
						        ?>
						    </div>
						    <div>
						        <?php

						        for ($i=0; $i<count($questions); $i++){
						            if ($questions[$i]) {
						                echo '<span class="gameScore">' .  $questions[$i]->{'score'} . ' pts</span><br>';
						            }
						        }
						        ?>
						    </div>
						    <div class="gameReponses">
						        <?php
						        $users = array();
						        if(!isset($_SESSION['rep']) && !empty($_SESSION['rep'])) {
						            $_SESSION['rep'] = array(
						                'score'=>0
						            );
						        }
						        for ($i=0; $i<count($questions); $i++){
						            if ($questions[$i]){
						                $reponse = '';
						                $_SESSION['score'] = $questions[$i]->{'score'};
						                if (is_object($questions[$i]->{'reponse'})){
						                    if(sizeof($questions[$i]->{'reponse'}->{'bonne_reponse'}) == 1){
						                        echo'<input class="checkbox" id= "reponse_bonne0"  value="'.$questions[$i]->{'reponse'}->{'bonne_reponse'}[0].
						                            '" name="reponse_bonne0" type="radio">
						                        <label class="container">'.$questions[$i]->{'reponse'}->{'bonne_reponse'}[0].
						                            '</label><br>';
						                    }
						                    if(sizeof($questions[$i]->{'reponse'}->{'bonne_reponse'}) > 1){
						                        for ($j=0; $j<sizeof($questions[$i]->{'reponse'}->{'bonne_reponse'});$j++){
						                            echo'<input class="checkbox" id= "reponse_bonne'.$j.'"  value="'.$questions[$i]->{'reponse'}->{'bonne_reponse'}[$j].
						                                '" name="reponse_bonne'.$j.'" type="checkbox">
						                            <label class="container">'.$questions[$i]->{'reponse'}->{'bonne_reponse'}[$j].
						                                '</label><br>';
						                        }
						                    }
						                    for ($k=0;$k<count($questions[$i]->{'reponse'}->{'fausse_reponse'});$k++){
						                    	if ($questions[$i]->{'type'}=="unique") {
						                    		echo'<input class="checkbox" value="'.$questions[$i]->{'reponse'}->{'fausse_reponse'}[$k].'" name="reponse'.$k.
						                            '" type="radio">
						                    		<label>'.$questions[$i]->{'reponse'}->{'fausse_reponse'}[$k].
						                            '</label><br>';
						                    	}elseif ($questions[$i]->{'type'}=="multiple") {
						                    		echo'<input class="checkbox" value="'.$questions[$i]->{'reponse'}->{'fausse_reponse'}[$k].'" name="reponse'.$k.
						                            '" type="checkbox">
						                    		<label>'.$questions[$i]->{'reponse'}->{'fausse_reponse'}[$k].
						                            '</label>';
						                    	}						                        
						                    }
						                }
						                else{
						                    echo '<input error="error-1" placeholder="Tapez ici la reponse" id="reponse_texte0" name="reponse_texte0" class="sign-up-input" value="';
						                    if(isset($_POST['reponse_texte0'])){
						                        $_SESSION['reponse_texte0'] = $_POST['reponse_texte0'];
						                        echo $_SESSION['reponse_texte0'];
						                    }
						                    echo '"/>';
						                    echo '<p class="input-validation" id="error-1"></p>';
						                }
						            }
						        }
						        $score = array(
						            $_SESSION['login']=>array()
						        );
						        $precedent = $currentPage-1;
						        $suivant = $currentPage + 1;
						        $_SESSION['pages'] = $pages;
						        $_SESSION['current'] = $currentPage;
						        $_SESSION['precedent'] = $precedent;
						        $_SESSION['suivant'] = $suivant;
						        if($_SESSION['current'] < $_SESSION['pages']){
						            echo ' <a href="player-home.php?&pages='.$_SESSION['suivant'].'"><input type="submit" value="Suivant"   name="btnNext" class="btnSuivant"></a> ';
						        }
						        if ($_SESSION['current'] == $_SESSION['pages']){
						            echo ' <a href="player-home.php?&pages='.$_SESSION['current'].'" ><input type="submit" name="btnLeave" class="btnOver" value="Términer"></a> ';
						        }
						        if($_SESSION['current']>1){
						            $link ='player-home.php?';
						            if($_SESSION['current']>2){
						                $link .= 'pages='.$_SESSION['precedent'];
						            }
						            echo ' <a href="'.$link.'"><input type="button" value="Précédent" name="btnPrev" class="btnPrecendent"></a> ';
						        }
						        echo '</form>';
						        ?>
						    </div>

		                   <?php
		                }
		                if(isset($_POST["quitter"])){
		                    header("Location: index.php");
		                }

		                if(isset($_POST['rejouer'])){
		                    header('Location:player-home.php');
		                }

		                if(isset($_POST['btnLeave'])){
		                    $_SESSION['terminer'] = $_POST['btnLeave'];
		                    $_SESSION['points'] = $_SESSION['rep']['score'];
		                    if(isset($_SESSION['login'], $_SESSION['prenom'], $_SESSION['nom'])){
		                        $nbre_points = $_SESSION['rep']['score'];
		                        $score[$_SESSION['login']]['prenom'] = $_SESSION['prenom'];
		                        $score[$_SESSION['login']]['nom'] = $_SESSION['nom'];
		                        $score[$_SESSION['login']]['login'] = $_SESSION['login'];
		                        $score[$_SESSION['login']]['score'] = $nbre_points;
		                        $js = file_get_contents('fichiers/score.json');
		                        $js= json_decode($js, true);
		                        if(!(isset($js))){
		                            $js[] = $score;
		                        }
		                        else{
		                            for ($i=0; $i<count($js); $i++){
		                                if(isset($js[$i][$_SESSION['login']])) {
		                                    foreach ($js[$i] as $key => $value) {
		                                        if (key_exists($key, $js[$i])){
		                                            if($js[$i][$key]['login'] ==  $_SESSION['login']){
		                                                $js[$i][$key]['score'] = $score[$_SESSION['login']]['score'];
		                                            }
		                                        }
		                                    }
		                                }
		                                else{
		                                    $js[$i][$_SESSION['login']]['prenom'] = $score[$_SESSION['login']]['prenom'];
		                                    $js[$i][$_SESSION['login']]['nom'] = $score[$_SESSION['login']]['nom'];
		                                    $js[$i][$_SESSION['login']]['login'] = $score[$_SESSION['login']]['login'];
		                                    $js[$i][$_SESSION['login']]['score'] =  $score[$_SESSION['login']]['score'];
		                                }
		                            }
		                        }
		                        $js = json_encode($js);
		                        file_put_contents('fichiers/score.json', $js);
		                    }

		                    if($_SESSION['login']){
		                        for($i=0;$i<count($users); $i++){
		                            if(isset($users[$i]->{'login'})){
		                                if($users[$i]->{'login'} == $_SESSION['login']){
		                                    $users[$i]->{'score'}[] =   $nbre_points;
		                                }
		                            }
		                        }
		                        $js_users = json_encode($users);
		                        file_put_contents('fichiers/users.json', $js_users);
		                    }
		                    $_SESSION['rep']['score'] = 0;
		                }

		                if(isset($_POST['btnLeave'])){
		                    ?>
		                    <form action="" method="post">
							    <?php
							    $score = file_get_contents('fichiers/score.json');
							    $score = json_decode($score);
							    $questions = file_get_contents('fichiers/questions.json');
							    $questions = json_decode($questions);
							    shuffle($questions);
							    for ($i=0;$i<count($score);$i++){
							        if (isset($score[$i]->{$_SESSION['login']})){
							            echo "<span class='finalScore'> Votre score est : ";
							            echo '<strong>';
							            echo $score[$i]->{$_SESSION['login']}->{'score'};
							            echo ' pts</strong>';
							            echo "</span><br>";
							        }
							    }
							    ?>
								    <input class="btnOver" type="submit" value="Rejouer" name="rejouer">
								    <input class="btnLeave" type="submit" value="Quitter" name="quitter">
								</form>
								<?php
								if(isset($_POST['rejouer'])) {
								    shuffle($questions);
								}
								?>
		                    <?php
		                }

		                if(!($_SESSION['login'])){
		                    $_SESSION['rep']['score'] = 0;
		                }

		                ?>
		                <?php
		                if(isset($_POST['btnNext'])){
		                    $_SESSION['n']=$_SESSION['suivant'];
		                    header('Location:player-home.php?&pages='.$_SESSION['suivant'].'');
		                }
		                if(!isset($_POST['btnNext'])){
		                    if(isset($_SESSION['precedent'])){
		                        $_SESSION['n']=$_SESSION['precedent'];
		                    }else{
		                        $_SESSION['n'] = 1;
		                    }
		                }
		                ?>
							</div>
					<div class="marks-section">
						<div class="form-wizard-wrapper">
							<ul>
								<li><a class="form-wizard-link" href="javascript:;" data-attr="Top score"><span>Top score</span></a></li>
								<li><a class="form-wizard-link" href="javascript:;" data-attr="Mon meilleur score"><span>Mon meilleur score</span></a></li>
								<li class="form-wizardmove-active"></li>
							</ul>
							<div class="form-wizard-content-wrapper">
								<div class="form-wizard-content show" data-tab-content="Top score">
										<div class="topBestScore">
											<table>
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
													                'prenom' => $playerTab[$j]['prenom'],
													                'nom'=> $playerTab[$j]['nom'],
													                'meileur_score'=> $playerTab[$j]['meileur_score']
													            );
													        }
													    }
													}
													$classementParScore = array_unique($classement, SORT_REGULAR);
													$nbr = 0;
													$color0 = "#51BFD0";
													$color1 = "#3ADDD6";
													$color2 = "#e56CA7";
													$color3 = "#e56946";
													$color4 = "#F8FDFD";
													$color = "";
												    for ($j=0;$j<count($classement);$j++){
												    	if($nbr==0){
											                $color = $color0;
											            }
											            if($nbr==1){
											                $color = $color1;
											            }
											            if($nbr==2){
											                $color = $color2;
											            }
											            if($nbr==3){
											                $color = $color3;
											            }
											            if($nbr==4){
											                $color = $color4;
											            }
											            if(isset($classementParScore[$j])){
											            	echo '<tr>';
											            	echo "<td class='bestScore-data'>";
											                echo $classementParScore[$j]['nom'];
											                echo "</td>";
											                echo "<td class='bestScore-data'>";
											                echo $classementParScore[$j]['prenom'];
											                echo "</td>";
											                echo "<td style='border-bottom: 4px solid $color' class='bestScore-data'>";
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
										<div class="form-wizard-content" data-tab-content="Mon meilleur score">
											<h5 class="bestScore-title">Voici votre meilleur score</h5>
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
					</div>
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

		document.getElementById("game-form").addEventListener("submit",function(e){
				const inputs= document.getElementsByTagName("input");
				var error=false;
				for(input of inputs){
					if(input.hasAttribute("error")){
						var idDivError=input.getAttribute("error");
					if(!input.value){
						document.getElementById(idDivError).innerText="Désolé mais vous êtes obligé de répondre"
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
	</script>
</body>
</html>