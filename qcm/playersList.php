<div class="content">
	<div class="left">
		<div class="players-list">
			<h1 class="players-list-title">LISTE DES JOUEURS PAR SCORE</h1>
			<table class="table">
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

				        if(isset($_GET['pages'])){
				            $_GET['pages'] = intval($_GET['pages']);
				            $currentPage= $_GET['pages'];
				        }
				        else{
				            $currentPage = 1;
				        }
				        $count = count($classementParScore);
				        $perPage = 8;
				        $pages = ceil($count/$perPage);
				        $offeset = $perPage * ($currentPage - 1);
				        $classementParScore = array_slice($classementParScore,$offeset, $perPage);
				        for($i=0;$i<count($classement);$i++){
				            if(isset($classementParScore[$i])) {
				                echo '<tr>';
				                ?>
				                <td><img class="img-profil-player" src="<?php echo $classementParScore[$i]['avatar']; ?>"></td>
				                <?php
				                echo "<td>";
				                echo $classementParScore[$i]['nom'];
				                echo "</td>";
				                echo "<td>";
				                echo $classementParScore[$i]['prenom'];
				                echo "</td>";
				                echo "<td>";
				                echo $classementParScore[$i]['meileur_score'];
				                echo " pts</td>";
				                echo '</tr>';
				            }
				        }
				    ?>
				</tbody>
			</table>
			<?php
				$precedent = $currentPage-1;
				$suivant = $currentPage + 1;
				if($currentPage>1){
				    $link ='admin-home.php?page=playersList';
				    if($currentPage>2){
				        $link .= '&pages='.$precedent;
				    }
				    echo ' <a href="'.$link.'"><input type="button" class="btn_precendent" value="Précédent"></a> ';
				}
				if($currentPage<$pages){
				    echo ' <a href="admin-home.php?page=playersList&pages='.$suivant.'"><input type="button" class="btn_suivant" value="Suivant"></a> ';
				}
			?>
		</div>
	</div>
</div>