<?php
		//Questions
		$questions = file_get_contents('fichiers/questions.json');
		$questions = json_decode($questions);
		$textCount=0;
		$uniqueCount=0;
		$multipleCount=0;
		for ($i=0; $i <count($questions) ; $i++) { 
			if ($questions[$i]->{'type'}=='text') {
				$textCount=json_encode($textCount+1);
			}elseif ($questions[$i]->{'type'}=='unique') {
				$uniqueCount=json_encode($uniqueCount+1);
			}elseif ($questions[$i]->{'type'}=='multiple') {
				$multipleCount=json_encode($multipleCount+1);
			}
		}
		$questionsTotal=$textCount+$uniqueCount+$multipleCount;
		//Comptes
		$player = file_get_contents('fichiers/users.json');
		$player = json_decode($player);
		$playersCount=0;
		$adminsCount=0;
		for ($i=0; $i <count($player) ; $i++) { 
			if ($player[$i]->{'profil'}=='player') {
				$playersCount=json_encode($playersCount+1);
			}elseif ($player[$i]->{'profil'}=='admin') {
				$adminsCount=json_encode($adminsCount+1);
			}
		}
		$usersTotal=$playersCount+$adminsCount;
		//Score
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
		                    'login'=>$player[$i]->{'login'},
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
		                'login'=> $playerTab[$j]['login'],
		                'meileur_score'=> $playerTab[$j]['meileur_score']
		            );
		        }
		    }
		}
		$classementParScore = array_unique($classement, SORT_REGULAR);
		$nbr = 0;
		$top5=[];
	    for ($j=0;$j<count($classement);$j++){
            if(isset($classementParScore[$j])){
            	$top5[] = array(
		                'login'=> $classementParScore[$j]['login'],
		                'meileur_score'=> $classementParScore[$j]['meileur_score']
		            );
                $nbr++;
            }
            if($nbr == 5){
                break;
            }
		}
		
	?>
<script src="js/chart/Chart.js"></script>
<div class="form-wizard-wrapper">
	<ul>
	<li><a class="form-wizard-link" href="javascript:;" data-attr="users"><span>Utilisateurs</span></a></li>
	<li><a class="form-wizard-link" href="javascript:;" data-attr="questions"><span>Questions</span></a></li>
	<li><a class="form-wizard-link" href="javascript:;" data-attr="scores"><span>Top 5 des meilleurs scores</span></a></li>
	<li class="form-wizardmove-active"></li>
	</ul>
	<div class="form-wizard-content-wrapper">
		<div class="form-wizard-content show" data-tab-content="users">
			<div class="stats">
				<p class="usersTotal"><span><img class="statIcon" src="images/icones/users.png"></span> Nombre total d'utilisateurs: <?php echo $usersTotal;  ?></p>
				<canvas id="users" width="800" height="400"></canvas>
			</div>
		</div>
		<div class="form-wizard-content" data-tab-content="questions">
			<div class="stats">
				<p class="usersTotal"><span><img class="statIcon" src="images/icones/question.png"></span> Nombre total de questions: <?php echo $questionsTotal;  ?></p>
				<canvas id="questions" width="800" height="400"></canvas>

			</div>	
		</div>
		<div class="form-wizard-content" data-tab-content="scores">
			<div class="stats">
				<canvas id="scores" width="800" height="400"></canvas>

			</div>
		</div>		
	</div>
</div>
<script type="text/javascript">
	//Score
    var top5 =  JSON.parse('<?php echo json_encode($top5);?>');
    var scores = document.getElementById('scores');
    var scores = new Chart(scores, {
        type: 'bar',
        data: {
            labels: [top5[0]['login'], top5[1]['login'],top5[2]['login'],
                   top5[3]['login'],top5[4]['login']],
            datasets: [{
                label: 'Score',
                data: [top5[0]['meileur_score'], top5[1]['meileur_score'],top5[2]['meileur_score'],
                   top5[3]['meileur_score'],top5[4]['meileur_score']],
                backgroundColor: ['#51BFD0','#3ADDD6','#e56CA7','#e56946','#F8FDFD'],
                borderColor: [
                    '#51BFD0',
                    '#3ADDD6',
                    '#e56CA7',
                    '#e56946',
                    '#F8FDFD'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            title: {
                display: true,
                text: "Représentation du top 5 des meilleurs scores",
                position: 'bottom',
                fontColor: '#666',
                fontStyle: 'bold',
                fontFamily:"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
                fontSize: 20
            }
        }
    });
    //Utilisateurs
    var users = document.getElementById('users');
    var users = new Chart(users, {
        type: 'pie',
        data: {
            labels: ['Adminitrateurs', 'Joueurs'],
            datasets: [{
                data: [<?php echo $adminsCount;  ?>, <?php echo $playersCount;  ?>],
                backgroundColor: [
                    '#51BFD0',
                    '#e56CA7'
                ],
                borderColor: [
                    '#51BFD0',
                    '#e56CA7'
                ],
                borderWidth: 1
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Représentation des types de compte',
                position: 'bottom',
                fontColor: '#666',
                fontStyle: 'bold',
                fontFamily:"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
                fontSize: 20
            }
        }
    });

    //Questions
    var questions = document.getElementById('questions');
    var questions = new Chart(questions, {
        type: 'bar',
        data: {
            labels: ['Text', 'Unique', 'Multiple'],
            datasets: [{
                label: 'Nombre',
                data: [<?php echo $textCount;  ?>, <?php echo $uniqueCount;  ?>, <?php echo $multipleCount;  ?>],
                backgroundColor: [
                     '#51BFD0',
                    '#3ADDD6',
                    '#e56CA7'
                ],
                borderColor: [
                     '#51BFD0',
                    '#3ADDD6',
                    '#e56CA7'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            title: {
                display: true,
                text: 'Représentation du nombre de questions en fonction du type',
                position: 'bottom',
                fontColor: '#666',
                fontStyle: 'bold',
                fontFamily:"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
                fontSize: 20
            }
        }
    });


</script>