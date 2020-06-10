<?php
session_start();
require_once '../functions/db.php';
global $db;
if(isset($_POST['question']) && isset($_POST['score']) && isset($_POST['type']) && isset($_POST['nombre-reponse'])){
	if(empty($_POST['question']) || empty($_POST['score']) || empty($_POST['type']) || empty($_POST['nombre-reponse'])){
echo '<div class="alert alert-danger">Tous les champs sont obligatoire</div>';
}
else{
if(!is_numeric($_POST['score'])){
    echo  '<div class="alert alert-danger">Le score est de type numérique</div>';
}
else{
    if(!is_numeric($_POST['nombre-reponse'])){
        echo  '<div class="alert alert-danger">Le nombre reponse est de type numérique</div>';
    }
    else{
        if (!(isset($reponse)) && !(empty($reponse))){
            $reponse = array(
                'bonne-reponse'=>'',
                'mauvaise-reponse'=>''
            );
        }
        for ($i = 1; $i <= $_POST['nombre-reponse']; $i++){
            if (isset($_POST['reponse'.$i])) {
                if (empty($_POST['reponse'.$i])) {
                    echo '<div class="alert alert-danger">Vueillez renseigner la reponse'.$i.'<div class="alert alert-danger">';
                }
                else{
                    if(isset($_POST["checkreponse$i"])){
                        $reponse['bonne-reponse'][] = $_POST['reponse'.$i];
                    }
                    else{
                        $reponse['mauvaise-reponse'][] = $_POST['reponse'.$i];
                    }

                }
            }
        }
        $question = $_POST['question'];
        $score = $_POST['score'];
        $type = $_POST['type'];

        $questions = $db->prepare('INSERT INTO questions(question,score,type)
    VALUE  (:question, :score, :type)');
        $questions->execute(array(
            'question'=>$question,
            'score'=>$score,
            'type'=>$type
        ));
        $id = $db->lastInsertId();
    if(isset($reponse)) {
        foreach ($reponse as $key => $value) {
            if ($key == 'bonne-reponse') {
                foreach ($value as $cle => $val) {
                    $Reponses = $db->prepare('INSERT INTO reponses(reponse, juste, id_question)
				        VALUE (:reponse, :juste, :id_question)');
				    $Reponses->execute(array(
				        'reponse'=>$val,
				        'juste'=>1,
				        'id_question'=>$id
				    ));
                }
            } else {
                foreach ($value as $clees => $valeur) {
                    $Reponses = $db->prepare('INSERT INTO reponses(reponse, juste, id_question)
				        VALUE (:reponse, :juste, :id_question)');
				    $Reponses->execute(array(
				        'reponse'=>$valeur,
				        'juste'=>0,
				        'id_question'=>$id
				    ));
                }
            }

        }
    }

        echo '<div class="alert alert-success"> Votre question a été ajoutée avec succés</div>';

    }
}

}
}
