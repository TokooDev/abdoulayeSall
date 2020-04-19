<?php 
 include('Classes.php');
 session_start();

 //session_destroy();



	if( empty($_SESSION['nbrquestionParpatiie'])){
			$_SESSION['nbrquestionParpatiie'] =0;
	}


	if( isset($_POST['sub']) && !empty($_POST['question'])){
		$question=$_POST['question']; 
		$score=$_POST['score'];
		$choixtypereponse=$_POST['choixtypereponse'];
		$nbrreponse=$_POST['nbrreponse'];
		$tabreponse =array();
		$indextabrepose=0;
		$tabBonnereponse =array();
		$indextabBonnerepose=0;
		$rng = $_POST['rng'];
		$ques="";

	  $_SESSION['nbrquestionParpatiie'] = $_POST['nbrquestionParpatiie'];

	  if($choixtypereponse == "choixmult"){
		  for($i=1 ; $i<=$nbrreponse ; $i++){
			  $tabreponse[$indextabrepose]=$_POST['reponse'.$i];
			  $indextabrepose++;
			  if(in_array('r'.$i, $_POST['repchecked'])){
				  $tabBonnereponse[$indextabBonnerepose]=$_POST['reponse'.$i];
				  $indextabBonnerepose++;
				}
		  }
		  $ques =['question'=>$question,'score'=>$score,'typeReponse'=>$choixtypereponse,'nbrReponse'=>$nbrreponse,'reponse'=>$tabreponse,'bonReponse'=>$tabBonnereponse,'asuivre'=>[]];
	  }elseif($choixtypereponse == "choixsimple"){
		  for($i=1 ; $i<=$nbrreponse ; $i++){
			  $tabreponse[$indextabrepose]=$_POST['reponse'.$i];
			  $indextabrepose++;
			  if($_POST['repadio']=="r".$i){
				  $tabBonnereponse[$indextabBonnerepose]=$_POST['reponse'.$i];
				  $indextabBonnerepose++;
			  }
		  }
		  $ques =['question'=>$question,'score'=>$score,'typeReponse'=>$choixtypereponse,'nbrReponse'=>$nbrreponse,'reponse'=>$tabreponse,'bonReponse'=>$tabBonnereponse,'asuivre'=>[]];
	  }else{
		for($i=1 ; $i<=$nbrreponse ; $i++){
			$tabBonnereponse[$indextabBonnerepose]=$_POST['reponse'.$i];
			$indextabBonnerepose++;
		}
		  $ques = ['question'=>$question,'score'=>$score,'typeReponse'=>$choixtypereponse,'reponse'=>$tabBonnereponse,'asuivre'=>[]];
	  }
	  
	  $bool=false;
	  if( !empty($_SESSION['tabtabquestion'])){
	  foreach ($_SESSION['tabtabquestion'] as $key => $value) {
		   if( $ques == $value ){
			  $bool=true;
		  }
	  }
	}elseif( isset($_POST['sub']) && !empty($_POST['nbrquestionParpatiie']) ){
		$_SESSION['nbrquestionParpatiie'] = $_POST['nbrquestionParpatiie'];
	}

	   if(!$bool){
			$n = $_SESSION["indexnbrQues"];
			$_SESSION['tabtabquestion'][]= $ques;
			if( empty($_SESSION['nbrquestionParpatiie'])){
				$_SESSION['nbrquestionParpatiie'] =0;
			}
			$_SESSION['indexnbrQues'] ++;
			$ques="";
	   }
   }
		// if( !empty($_SESSION['tabtabquestion'])){
		// 	echo"<pre>";
		//     var_dump($_SESSION['tabtabquestion']);
		//     echo"</pre>";
		// }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admine Page</title>
	<link rel="stylesheet" type="text/css" href="admine.css?<?php echo time();?>">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>

	<div id="container">
	  <div id="conatinerQuestionaire">
		<form action="pageAdmin.php" method="post">
			<div class="item-form">
			    <label for="" style="width: 20%;">Nbr questions par partie</label>
				<input class="input" name="nbrquestionParpatiie" required type="number" value="<?php if(isset($_SESSION['nbrquestionParpatiie'])){ echo $_SESSION['nbrquestionParpatiie'];}  ?>">
			</div>
		    <div class="item-form">
				<div style="height: 100px;width: 10%;text-align:center;margin-right:10%; margin-top:20px;">
				<label style="width: 100%;text-align: center;font-size:0.8em;position:relative;top:40px;left:2px;" for="">QUESTION</label>
			</div>
			<textarea class="entres" name="question" id="" cols="30" rows="5" required></textarea>
			</div>
			<div class="item-formr">
				<label for="" style="width: 20%;">Score</label>
				<input class="input" name="score" required type="number">
			</div>
			<div class="item-formr" style="margin-top: 20px">
				<label for="" style="width: 20%;">Type</label>
				<select  class="input" onchange="fonctionMachin();" id="choixtypereponse" name="choixtypereponse" required>
					<option value="choixmult" checked="checked" >Choix multiple</option>
					<option value="choixsimple">Choix simple</option>
					<option value="choixtext">Choix text</option>
				</select>
			</div>
			<div class="item-formr" style="margin-top: 20px">
				<label for="" style="width: 20%;">Nombre reposnse</label>
				<input class="input" required name="nbrreponse" type="number" onkeyup="fonctionMachin();" id="nbrrep">
			</div>
            <div id="divrep">
                
			</div>
            <div class="item-form" style="margin-top: 10px">
				<div style="height: 60px;width: 80%;text-align:center;margin-right: 9%;"><input name="sub" type="submit" style="height: 60px;width: 80%;text-align: center;font-size:0.8em;position:relative;top:20px;left:20%;background-color:lime" for=""></div>
			</div>
			<input type="hidden" name="rng" value=" <?php
			    echo rand(1,1000);
 			?>">
		</form>
	  </div>
	</div>

		 <div style="display: none;">
		 <div class="item-formr" style="margin-top: 20px" id="clone">
				<label for="" style="width: 20%;" id="lab">Reponse :</label>
				<input class="inputrep" required type="text" id="input">
				<input type="checkbox" class="radio" id="check"  name="repchecked[]">
				<input type="radio" class="radio" id="radioo" name="repadio">
		 </div>
		 </div>
      <script>
		     function fonctionMachin(){
				var input = document.getElementById("nbrrep").value;
				var choixreponse =document.getElementById("choixtypereponse").value;
				$('#divrep').empty();
				if (choixreponse === 'choixmult') {
					for (let index = 1; index <=parseInt(input); index++) {
							var clone = $('#clone').clone();
							clone.find('#check').attr('value','r'+index);
							clone.find('#input').attr('name','reponse'+index);
							clone.find('#radioo').css({visibility:'hidden'});
							$('#divrep').append(clone);
				}
				}else if (choixreponse == 'choixsimple'){
					for (let index = 1; index <=parseInt(input); index++) {
							var clone = $('#clone').clone();
							clone.find('#check').css({visibility:'hidden'});
							clone.find('#radioo').attr('value','r'+index);
							clone.find('#input').attr('name','reponse'+index);
							$('#divrep').append(clone);
				}
				}else if(choixreponse == 'choixtext'){
					for (let index = 1; index <=parseInt(input); index++) {
							var clone = $('#clone').clone();
							clone.find('#input').attr('name','reponse'+index);
							clone.find('#radioo').css({visibility:'hidden'});
							clone.find('#check').css({visibility:'hidden'});
							$('#divrep').append(clone);
				}
				}
			 }
	  </script>
</body>
</html>