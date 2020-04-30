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
		//Score
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
		$nbr=0;
	    for ($j=0;$j<count($classement);$j++){
            if(isset($classementParScore[$j])){
                $nom=json_encode($classementParScore[$j]['nom']);
                $prenom= json_encode($classementParScore[$j]['prenom']);
                $meilleurScore= json_encode($classementParScore[$j]['meileur_score']);
                $nbr=$nbr+1;
            }
            if($nbr ==5){
                break;
            }
		}
	?>
<script src="js/chart/Chart.js"></script>
<div class="form-wizard-wrapper">
	<ul>
	<li><a class="form-wizard-link" href="javascript:;" data-attr="users"><span>Utilisateurs</span></a></li>
	<li><a class="form-wizard-link" href="javascript:;" data-attr="questions"><span>Questions</span></a></li>
	<li><a class="form-wizard-link" href="javascript:;" data-attr="scores"><span>Scores</span></a></li>
	<li class="form-wizardmove-active"></li>
	</ul>
	<div class="form-wizard-content-wrapper">
		<div class="form-wizard-content show" data-tab-content="users">
			<div class="stats">
				<canvas id="pie" width="800" height="350"></canvas>
			</div>
		</div>
		<div class="form-wizard-content" data-tab-content="questions">
			<div class="stats">
				<canvas id="line" width="800" height="350"></canvas>

			</div>	
		</div>
		<div class="form-wizard-content" data-tab-content="scores">
			<div class="stats">
				<canvas id="bar" width="800" height="350"></canvas>

			</div>
		</div>		
	</div>
</div>
<script type="text/javascript">
	//Score
var ctx = document.getElementById('bar');
var colors = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php echo $prenom; ?>],
        datasets: [{
            label: 'Score',
            data: [<?php echo $meilleurScore; ?>],
            backgroundColor: [
                '#51BFD0',
                '#3ADDD6',
                '#e56CA7',
                '#e56946',
                '#F8FDFD'
            ],
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
            text: "Représentation de l'évolution des scores",
            position: 'bottom',
            fontColor: '#666',
            fontStyle: 'bold',
            fontFamily:"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
            fontSize: 20
        }
    }
});
//Utilisateurs
var ctx = document.getElementById('pie');
var colors = new Chart(ctx, {
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
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
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
var ctx = document.getElementById('line');
var colors = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Text', 'Unique', 'Multiple'],
        datasets: [{
            label: 'Nombre',
            data: [<?php echo $textCount;  ?>, <?php echo $uniqueCount;  ?>, <?php echo $multipleCount;  ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                '#3ADDD6',
                'rgba(255, 206, 86, 0.2)'
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