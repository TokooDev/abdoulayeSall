<div >
	<div class="left">
		<div class="questions-list">
			<div class="question-list-header">
				<h3 class="questions-list-title">
				Nbre de question/Jeu
				</h3>
				<?php
			        $nbreQuestion = file_get_contents('fichiers/nbreQuestion.json');
			        $nbreQuestion = json_decode($nbreQuestion);
			    ?>
				<form method="post" action="" class="questions-list-form" >
					<input class="input-nbrQuestion" type="text" name="nbreQuestion" value="<?php if(isset($nbreQuestion[0]))
        {echo $nbreQuestion[0] ;} ?>">
				<input class="btn-nbrQuestion" type="submit" name="btn-nbreQuestion" value="OK">
				</form>
				<p>
					<?php
		        if(isset($_POST['btn-nbreQuestion'])){
		            if(empty($_POST['nbreQuestion'])){
		                echo '<p class="input-validation">Vueillez donner le nombre de questions</p>';
		            }
		            else{
		            	$nbreQuestion=array();
		            	$nbreQuestion[]=$_POST['nbreQuestion'];
		            	$nbreQuestion[]=$nbreQuestion;
						$nbreQuestion=json_encode($nbreQuestion);
						file_put_contents('fichiers/nbreQuestion.json', $nbreQuestion);
		            }
		        }
		        ?>
				</p>
			</div>
			<div class="questions-list-content">
				<?php
			        $questions = file_get_contents('fichiers/questions.json');
			        $questions = json_decode($questions);
			        if(isset($_GET['pages'])){
			            $_GET['pages'] = intval($_GET['pages']);
			            $pageActuelle= $_GET['pages'];
			        }
			        else{
			            $pageActuelle = 1;
			        }
			        $count = count($questions);
			        $parPage = 5;
			        $pages = ceil($count/$parPage);
			        $pas = $parPage * ($pageActuelle - 1);
			        $questions = array_slice($questions,$pas, $parPage);
			        for ($i=0; $i<count($questions); $i++){
			            $n = $i+1;
			                if ($questions[$i]){
			                    $question = $n.'.'.$questions[$i]->{'questions'} ;
			                    ?>
			                    <div class='question'><?php echo $question; ?></div>
			                    <?php
			                    if (is_object($questions[$i]->{'reponse'})) {
			                        if ($questions[$i]->{'type'}=="multiple") {
			                        	for ($j=0; $j<sizeof($questions[$i]->{'reponse'}->{'bonne_reponse'});$j++){
			                        		?>
			                        		<input checked type="checkbox"/>
			                        		<span class="reponse"><?php echo $questions[$i]->{'reponse'}->{'bonne_reponse'}[$j]; ?></span><br>
			                        		<?php
			                       			 }
			                        for ($k=0;$k<count($questions[$i]->{'reponse'}->{'fausse_reponse'});$k++){
			                        	?>
			                        		<input type="checkbox"/>
			                        		<span class="reponse"><?php echo $questions[$i]->{'reponse'}->{'fausse_reponse'}[$k]; ?></span><br>
			                        		<?php
			                        }
			                        }elseif ($questions[$i]->{'type'}=="unique") {
			                        	for ($j=0; $j<sizeof($questions[$i]->{'reponse'}->{'bonne_reponse'});$j++){
			                        		?>
			                        		<input checked type="radio"/>
			                        		<span class="reponse"><?php echo $questions[$i]->{'reponse'}->{'bonne_reponse'}[$j]; ?></span><br>
			                        		<?php
			                        }
			                        for ($k=0;$k<count($questions[$i]->{'reponse'}->{'fausse_reponse'});$k++){
			                        	?>
			                        		<input type="radio"/>
			                        		<span class="reponse"><?php echo $questions[$i]->{'reponse'}->{'fausse_reponse'}[$k]; ?></span><br>
			                        		<?php
			                        }
			                        }
			                    }
			                    else{
			                        echo "<div class='reponse'><input class='input-reponse' value='".$questions[$i]->{'reponse'}."'/></div><br/>";
			                    }
			                }
			        }
			        ?>
			        </div>
			        <div>
			        	<div class="question-pagination">
			        		<?php
			        $precedent = $pageActuelle-1;
			        $suivant = $pageActuelle + 1;
			        if($pageActuelle>1){
			            $link ='admin-home.php?page=questionsList';
			            if($pageActuelle>2){
			                $link .= '&pages='.$precedent;
			            }
			            echo ' <a href="'.$link.'"><button class="btn_precendent">&laquo;Précédent</button></a> ';
			        }
			        if($pageActuelle<$pages){
			            echo ' <a href="admin-home.php?page=questionsList&pages='.$suivant.'"><button class="btn_suivant">Suivant &raquo;</button></a> ';
			        }
				?>
			        	</div>
			        
			</div>
		</div>
	</div>
</div>
