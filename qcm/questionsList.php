<div >
	<div class="left">
		<div class="questions-list">
			<div class="question-list-header">
				<h3 class="questions-list-title">
				Nbre de question/Jeu
				</h3>
				<form method="post" action="" class="questions-list-form" >
					<input class="input-nbrQuestion" type="text" name="nbrQuestion" value="<?php if(isset($_POST['nbrQuestion']))
				{echo $_POST['nbrQuestion'] ;} ?>">
				<input class="btn-nbrQuestion" type="submit" name="btn-nbrQuestion" value="OK">
				</form>
			</div>
			<div class="questions-list-content">
				<?php
		        if(isset($_POST['btn-nbrQuestion'])){
		            if(empty($_POST['nbrQuestion'])){
		                echo '<p class="input-validation">Vueillez donner le nombre de questions</p>';
		            }
		            else{
		                $nbrQuestion=$_POST['nbrQuestion'];
		            }
		        }
			        $questions = file_get_contents('fichiers/questions.json');
			        $questions = json_decode($questions);
			        if(isset($_GET['pages'])){
			            $_GET['pages'] = intval($_GET['pages']);
			            $currentPage= $_GET['pages'];
			        }
			        else{
			            $currentPage = 1;
			        }
			        $count = count($questions);
			        $perPage = 3;
			        $pages = ceil($count/$perPage);
			        $offeset = $perPage * ($currentPage - 1);
			        $questions = array_slice($questions,$offeset, $perPage);

			        for ($i=0; $i<count($questions); $i++){
			            $x = $i+1;
			                if ($questions[$i]){
			                    $affich_question = $x.'.'.$questions[$i]->{'questions'} ;
			                    echo "<span class='question'>$affich_question</span><br/>";
			                    if (is_object($questions[$i]->{'reponse'})) {
			                        if ($questions[$i]->{'type'}=="multiple") {
			                        	for ($j=0; $j<sizeof($questions[$i]->{'reponse'}->{'bonne_reponse'});$j++){
			                            echo '<input checked type="checkbox"/><span class="reponse">'.$questions[$i]->{'reponse'}->{'bonne_reponse'}[$j].'</span><br/>';
			                        }
			                        for ($k=0;$k<count($questions[$i]->{'reponse'}->{'fausse_reponse'});$k++){
			                            echo '<input type="checkbox"/><span class="reponse">'.$questions[$i]->{'reponse'}->{'fausse_reponse'}[$k].'</span><br/>';
			                        }
			                        }elseif ($questions[$i]->{'type'}=="unique") {
			                        	for ($j=0; $j<sizeof($questions[$i]->{'reponse'}->{'bonne_reponse'});$j++){
			                            echo '<input checked type="radio"/><span class="reponse">'.$questions[$i]->{'reponse'}->{'bonne_reponse'}[$j].'</span><br/>';
			                        }
			                        for ($k=0;$k<count($questions[$i]->{'reponse'}->{'fausse_reponse'});$k++){
			                            echo '<input type="radio"/><span class="reponse">'.$questions[$i]->{'reponse'}->{'fausse_reponse'}[$k].'</span><br/>';
			                        }
			                        }
			                    }
			                    else{
			                        echo '<span class="reponse"><input class="input-reponse" name="reponse'.$i.'" "/></span><br/>';
			                    }
			                }
			        }
			        echo '</div><div>';
			        $precedent = $currentPage-1;
			        $suivant = $currentPage + 1;
			        if($currentPage>1){
			            $link ='admin-home.php?page=questionsList';
			            if($currentPage>2){
			                $link .= '&pages='.$precedent;
			            }
			            echo ' <a href="'.$link.'"><button class="btn_precendent">&laquo;Précédent</button></a> ';
			        }
			        if($currentPage<$pages){
			            echo ' <a href="admin-home.php?page=questionsList&pages='.$suivant.'"><button class="btn_suivant">Suivant &raquo;</button></a> ';
			        }
				?>
			</div>
		</div>
	</div>
</div>
